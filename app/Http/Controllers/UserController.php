<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Payment;

class UserController extends Controller
{
    public function show($id)
    {
        $userChatRooms = Auth::user()->chatRooms;

        $sellerChatRooms = Auth::user()->sellerChatRooms;

        return view('users.show', compact('userChatRooms', 'sellerChatRooms'));
    }

    public function getUserInfo(){
        $user = Auth::user();
        $defaultCard = Payment::getDefaultcard($user);

        return view('users.index', compact('user', 'defaultCard'));
    }

    public function changeProfile($id){
        return view('users.profile');
    }

    public function storeProfile(Request $request){
        dd($request);

        return redirect('users.show');
    }

}
