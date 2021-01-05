@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="mb-5">

  @foreach ($userChatRooms as $userChatRoom)
    <a class="card" href="{{route('chat.show', ['id' => $userChatRoom->id])}}">
      ユーザー{{$userChatRoom->id}}
    </a>
  @endforeach

  @foreach ($sellerChatRooms as $sellerChatRoom)
    <a class="card" href="{{route('chat.show', ['id' => $sellerChatRoom->id])}}">
      出品者{{$sellerChatRoom->id}}
    </a>
  @endforeach
</div>

<a href="{{route('payment.payment')}}">
  クレジットカードを登録する
</a>

<form class="mt-5" id="logout-button" method="POST" action="{{ route('logout') }}">
  @csrf
  <button form="logout-button" class="dropdown-item" type="submit">
    ログアウト
  </button>
</form>
@endsection

