<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::findorFail($id); // 追記
        
        return view('users.show');
    }
}
