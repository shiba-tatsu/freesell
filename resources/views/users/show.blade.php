@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="mb-5">
  test
  <item_edit>
  </item_edit>

  <review_modal>
  </review_modal>

  @foreach ($userChatRooms as $userChatRoom)
    <a class="card" href="{{route('chat.show', ['id' => $userChatRoom->id])}}">
      ユーザー{{$userChatRoom->id}}
  @endforeach

  @foreach ($sellerChatRooms as $sellerChatRoom)
    <a class="card" href="{{route('chat.show', ['id' => $sellerChatRoom->id])}}">
      出品者{{$sellerChatRoom->id}}
  @endforeach
</div>

<form id="logout-button" method="POST" action="{{ route('logout') }}">
  @csrf
  <button form="logout-button" class="dropdown-item" type="submit">
    ログアウト
  </button>
</form>
@endsection

