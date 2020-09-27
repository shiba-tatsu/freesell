<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::findorFail($id); 

        $userChatRooms = Auth::user()->chatRooms;

        $sellerChatRooms = Auth::user()->sellerChatRooms;
        return view('users.show', compact('userChatRooms', 'sellerChatRooms'));
    }
}
