<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Payment;
use App\Item;
use App\Purchase_history;

class PaymentController extends Controller
{
    public function getCurrentPayment(){
        $user = \Auth::user();
        $defaultCard = Payment::getDefaultcard($user);

        return view('payment.index', compact('user', 'defaultCard'));

    }

    public function getPaymentForm(){

        $user = Auth::user();
        return view('payment.form');

    }


    public function storePaymentInfo(Request $request){
        /**
         * フロントエンドから送信されてきたtokenを取得する
         * 
         **/
        $token = $request->stripeToken;
        $user = Auth::user(); 
        $ret = null;

        /**
         * 当該ユーザーがtokenもっていない場合Stripe上でCustomer（顧客）を作る
         * 
         **/
        if ($token) {

            if (!$user->stripe_id) {
                $result = Payment::setCustomer($token, $user);

                /* card error */
                if(!$result){
                    $errors = "カード登録に失敗しました。入力いただいた内容に相違がないかを確認いただき、問題ない場合は別のカードで登録を行ってみてください。";
                    return redirect('/users/payment/form')->with('errors', $errors);
                }

            } else {
                $defaultCard = Payment::getDefaultcard($user);
                if (isset($defaultCard['id'])) {
                    Payment::deleteCard($user);
                }

                $result = Payment::updateCustomer($token, $user);

                /* card error */
                if(!$result){
                    $errors = "カード登録に失敗しました。入力いただいた内容に相違がないかを確認いただき、問題ない場合は別のカードで登録を行ってみてください。";
                    return redirect('/users/payment/form')->with('errors', $errors);
                }

            }
        } else {
            return redirect('/users/payment/form')->with('errors', '申し訳ありません、通信状況の良い場所で再度ご登録をしていただくか、しばらく立ってから再度登録を行ってみてください。');
        }


        return redirect('/users/payment')->with("success", "カード情報の登録が完了しました。");
    }


    public function deletePaymentInfo(){
        $user = User::find(Auth::id());

        $result = Payment::deleteCard($user);

        if($result){
            return redirect('/users/payment')->with('success', 'カード情報の削除が完了しました。');
        }else{
            return redirect('/users/payment')->with('errors', 'カード情報の削除に失敗しました。恐れ入りますが、通信状況の良い場所で再度お試しいただくか、しばらく経ってから再度お試しください。');
        }
    }

    public function buy(Item $item, Request $request){
        $user = Auth::user();
        $defaultCard = Payment::getDefaultcard($user);
        return view('/payment/buy', compact('item', 'request'));
    }

    public function pay(Request $request){
        \Stripe\Stripe::setApiKey(\Config::get('payment.stripe_secret_key'));
        
        try {
            Payment::create([
                'item_id' =>$request->item_id,
                'user_id' =>$request->user_id,
                'name' =>$request->name,
                'postal' =>$request->postal,
                'rigion' =>$request->region,
                'city' =>$request->city,
                'address' =>$request->address,
                'phoneNumber' =>$request->phonenumber,
                'quantity' =>$request->quantity
            ]);
            
            $user = User::find(Auth::id());
            $chargeOject = [
                'amount'      => $request->item_price * $request->quantity + $request->item_fee,
                'currency'    => 'jpy',
                'description' => 'ユーザー：'.$user->name."、商品を購入",
                'customer'      => $user->stripe_id,
            ];

            $charge = \Stripe\Charge::create($chargeOject);

        } catch (\Stripe\Exception\CardException $e) {
            $body = $e->getJsonBody();
            $errors  = $body['error'];

            
        }
        return redirect()->route('payment.complete');
    }

    public function complete(){
        return view('payment.complete');
    }
}