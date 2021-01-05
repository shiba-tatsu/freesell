<?php

namespace App\Http\Controllers;

use App\Item;
use App\Image;
use App\User;
use App\Payment;
use App\Category;
use App\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index(Request $request)
    {
        // \Debugbar::info($items);

        // ここからカテゴリーのランキングを取得
        $payments = Payment::all();

        // カテゴリーの親idをキー、購入された数を値にし、連想配列化する。
        $arr = array();
        foreach($payments as $payment){
            if(array_key_exists($payment->item->category->parent_id, $arr)){
                $arr[$payment->item->category->parent_id] += $payment->quantity;
            }else{
                $arr[$payment->item->category->parent_id] = $payment->quantity;
            }
        }

        // ランキング1位から3位を取得
        $max = array_keys($arr, max(array_values($arr))); // 購入された数の最大値を取得
        if(count($max) == 1){ 
            $goldId = $max[0];
            unset($arr[$goldId]);
            $max = array_keys($arr, max(array_values($arr)));
            if(count($max) == 1){
                $silverId = $max[0];
                unset($arr[$silverId]);
                $max = array_keys($arr, max(array_values($arr)));
                $bronzeId = $max[0];
            }else{
                $silverId = $max[0];
                $bronzeId = $max[1];
            }
        }elseif(count($max) == 2){
            $goldId = $max[0];
            $silverId = $max[1];
            unset($arr[$goldId], $arr[$silverId]);
            $max = array_keys($arr, max(array_values($arr)));
            $bronzeId = $max[0];
        }else{
            $goldId = $max[0];
            $silverId = $max[1];
            $bronzeId = $max[2];
        }
        
        // ランキング順位毎に配列を取得
        $goldLists = Item::whereHas('category', function($query) use($goldId){
            $query->where('parent_id', $goldId);
        })->paginate(3);

        $silverLists = Item::whereHas('category', function($query) use($silverId){
            $query->where('parent_id', $silverId);
        })->paginate(3);

        $bronzeLists = Item::whereHas('category', function($query) use($bronzeId){
            $query->where('parent_id', $bronzeId);
        })->paginate(3);
        // カテゴリーランキングの取得完了

        return view('item/index', compact('goldLists', 'silverLists', 'bronzeLists'));
    }

    public function create()
    {
        return view('item.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $item = new Item();
        $item->category_id = $request->category_id;
        $item->status = $request->input('status');
        $item->name = $request->input('name');
        $item->body = $request->input('body');
        $item->price = $request->input('price');
        $item->fee = $request->input('fee');
        $item->region = $request->input('region');
        $item->delivery_day = $request->input('delivery_day');
        $item->quantity = $request->input('quantity');
        $item->seller_id = $request->user()->id;
        
        $item->save();
        
        foreach($request->file('image') as $img){
            
            Image::create([
                $path = Storage::disk('s3')->putFile('/', $img, 'public'),
                'image' => Storage::disk('s3')->url($path),
                'item_id' => $item->id
            ]);
            /* ローカルでの画像登録
            $uploadImg = $img->getClientOriginalName(),
            $filePath = $img->storeAs('public', $uploadImg),
            'image' => $uploadImg,
            'item_id' => $item->id]);
            */
        }
        
        return redirect()->route('item.index');
    }

    public function show(Item $item)
    { 
        $reviews = $item->reviews;
        \Debugbar::info($item);
        $sameUserItems = Item::where('seller_id', $item->seller_id)
                         ->where('id', '<>', $item->id)->paginate(3);

        $sameCategoryItems = Item::where('category_id', $item->category_id)
                             ->where('id', '<>', $item->id)->paginate(3);

        $reviewAverage = Review::where('item_id', $item->id)->avg('star');
        return view('item/show', compact('item', 'reviews', 'sameUserItems', 'sameCategoryItems', 'reviewAverage'));
    }

    public function edit(Item $item)
    {
        return view('item.edit', ['item' => $item]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        foreach($item->images as $delImg){
            ($delImg->delete());
        }
        $item->category_id = $request->category_id;
        $item->status = $request->input('status');
        $item->name = $request->input('name');
        $item->body = $request->input('body');
        $item->price = $request->input('price');
        $item->fee = $request->input('fee');
        $item->region = $request->input('region');
        $item->delivery_day = $request->input('delivery_day');
        $item->quantity = $request->input('quantity');
        $item->save();
        
        foreach($request->file('image') as $img){
            
            Image::create([
                $path = Storage::disk('s3')->putFile('/', $img, 'public'),
                'image' => Storage::disk('s3')->url($path),
                'item_id' => $item->id
            ]);
        }

        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('item.index');
    }
}
