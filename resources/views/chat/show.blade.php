@extends('layouts.chatapp')

@section('content')

@include('layouts.nav')
<div class="chatPage">
  <header class="header">
  {{--<a href="{{route('')}}" class="linkToMatching"></a>--}}
    <div class="chatPartner">
      <div class="chatPartner_img"><img src=""></div>
      <div class="chatPartner_name">{{ $chat_room_seller -> name }}</div>
    </div>
  </header>
  <div class="container">
    <div class="messagesArea messages">
    @foreach($chat_messages as $message)
      <div class="message">
        <span>{{$message->user->name}}</span>
        <div class="commonMessage">
          <div>
          {{$message->message}}
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>
  <form class="messageInputForm">
    <div class='container'>
      <input type="text" data-behavior="chat_message" class="messageInputForm_input" placeholder="メッセージを入力...">
    </div>
  </form>
</div>

<script>
var chat_room_id = {{ $chat_room_id }};
var user_id = {{ Auth::user()->id }};
var current_user_name = "{{ Auth::user()->name }}";
var chat_room_seller_name = "{{ $chat_room_seller->name }}";
var mix_pusher_app_key = "{{ config('pusher.mix_pusher_app_key') }}";
var mix_pusher_app_cluster = "{{ config('pusher.mix_pusher_app_cluster') }}"
</script>

@endsection