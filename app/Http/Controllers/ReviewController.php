<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Item;

class ReviewController extends Controller
{
    public function create()
    {
        return view('item.review');
    }
    
    public function store(Request $request)
    {
        $item = $request->input('item_id');

        Review::create([
            'star' => $request->input('star'),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => $request->user()->id,
            'item_id' => $item,
        ]);

        return redirect()->route('item.show', ['item' => $item]);
        //return view('item/show', ['item' => $item]);

    }
}
