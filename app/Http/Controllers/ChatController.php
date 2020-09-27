<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChatRoom;
use App\ChatMessage;
use App\User;
use App\Item;

use App\Events\ChatPusher;

use Auth;

class ChatController extends Controller
{
    public static function create(Request $request) {
        
        $seller_id = $request->seller_id;
        
        // ユーザーの持っているチャットルームを取得
        $user_chat_room = ChatRoom::where('user_id', Auth::id())
        ->where('seller_id', $seller_id)->first();    
    
        // なければ作成する
        if ($user_chat_room === null){
    
            ChatRoom::create(
            ['user_id' => Auth::id(),
            'seller_id' => $seller_id
            ]); //チャットルーム作成
            
            $user_chat_room = ChatRoom::where('user_id', Auth::id())
            ->where('seller_id', $seller_id)->first();
        }

        $chat_room_id = $user_chat_room->id;

        return redirect()->route('chat.show', ['id' => $chat_room_id]);
    }

    public static function show($id){

        $chat_room = ChatRoom::findOrFail($id);
        $chat_room_id = $id;

        //出品者を取得
        $chat_room_seller = $chat_room->seller;
       
        // 出品者のユーザー名を取得(JS用)
        $chat_room_seller_name = $chat_room_seller->name;

        $chat_messages = ChatMessage::where('chat_room_id', $chat_room_id)
        ->orderby('created_at')
        ->get();

        // チャットルームに入ってるユーザー以外をリダイレクトする
        if(Auth::user()->id !== $chat_room->user_id && Auth::user()->id !== $chat_room->seller_id){
            $items = Item::where('quantity', '>', 0)->paginate(15);
            return redirect()->route('item.index', compact('items'));
        }
        else{
            return view('chat.show', compact(
                'chat_room','chat_room_id', 'chat_room_seller', 'chat_messages')
            );
        }
    }

    public static function chat(Request $request){

        // 原因は不明だがcreateではうまくいかないので、saveを使用
        $chat = new ChatMessage();
        $chat->chat_room_id = $request->chat_room_id;
        $chat->user_id = $request->user_id;
        $chat->message = $request->message;
        $chat->save();

        event(new ChatPusher($chat));
    }
}
