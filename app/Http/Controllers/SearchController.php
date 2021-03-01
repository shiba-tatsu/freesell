<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class SearchController extends Controller
{
    // ヘッダーでの検索
    public function search(Request $request) {

        if($request->has('keyword')) {
            // SQLのlike句でitemsテーブルを検索する
            $items = Item::where('name', 'like', '%'.$request->get('keyword').'%')->where('quantity', '>', 0)->paginate(15);
            $keyword = $request->keyword;
            
        }
        else{
            $items = Item::where('quantity', '>', 0)->paginate(15);
            $keyword = null;
        }
            // \Debugbar::info($items);
            
        return view('item/search', ['items' => $items, 'keyword' => $keyword]);
    }

    // 絞り込み検索機能
    public function refined(Request $request){
        //「または」で検索がかかっている。「かつ」で検索したい。
        //dd($request);
        $keyword = $request->input('keyword');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        $statusChecked = $request->input('status');
        $delivery_day = $request->input('delevery_day');

        $query = Item::query();
 
        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
            $query->Where('body', 'LIKE', "%{$keyword}%");
        }
 
        if (!empty($minPrice) && !empty($maxPrice)) {
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }
        elseif(!empty($minPrice)){
            $query->where('price', '>=', $minPrice);
        }
        elseif(!empty($maxPrice)){
            $query->where('price', '<=', $maxPrice);
        }

        if (!empty(is_array($statusChecked))) {
            foreach($statusChecked as $status){
                $query->orWhere('status', $status);
            }
        }

        if (!empty($delivery_day)) {
            $query->where('delivery_day', '<=', $delively_day);
        }
 
        $items = $query->paginate(15);

        \Debugbar::info($items);

        return view('item/refined', compact('items','keyword','minPrice', 'maxPrice', 'statusChecked', 'delivery_day'));
    }
}
