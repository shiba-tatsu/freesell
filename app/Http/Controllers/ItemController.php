<?php

namespace App\Http\Controllers;

use App\Item;
use App\Image;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /*public function __construct()
    {
        $user = User::findorFail(Item::find($seller_id));;
    }
    */
    
     public function index(Request $request)
    {
        if($request->has('keyword')) {
        // SQLのlike句でitemsテーブルを検索する
            $items = Item::where('name', 'like', '%'.$request->get('keyword').'%')->where('quantity', '>', 0)->paginate(15);
        }
        else{
            $items = Item::where('quantity', '>', 0)->paginate(15);
        }
        \Debugbar::info($items);
        
        return view('item/index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //dd($item->likes);
        return view('item/show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
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
        //$item->seller_id = $request->user()->id;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect('item.index');
    }

    public function like(Request $request, Item $item)
    {
        $item->likes()->detach($request->user()->id);
        $item->likes()->attach($request->user()->id);

        return [
            'id' => $item->id,
            'countLikes' => $item->count_likes,
        ];
    }

    public function unlike(Request $request, item $item)
    {
        $item->likes()->detach($request->user()->id);

        return [
            'id' => $item->id,
            'countLikes' => $item->count_likes,
        ];
    }
}
