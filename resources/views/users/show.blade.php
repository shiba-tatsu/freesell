@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div class="container-fluid mt-5">
  <div class="text-center mb-5">
    <div class="fas fa-user-circle fa-6x text-primary"></div>
  </div>
  <div class="row mb-5">
    <a class="col-4 p-2 text-center" href="{{route('payment.payment')}}">
      <button type="button" class="userBtn btn-warning" style="width: 200px; height:50px; border:none;">クレジットカード登録</button>
    </a>
    <div class="col-4 p-2 text-center">
      <button type="button" class="userBtn btn-warning" style="width: 200px; height:50px; border:none;">プロフィール編集</button>
    </div>
    <div class="col-4 p-2 text-center">
      <button type="button" class="userBtn btn-warning" style="width: 200px; height:50px; border:none;">商品一覧</button>
    </div>
  </div>

  <div class="row mb-5">
    <div class="col-4 p-2 text-center">
      <button type="button" class="userBtn btn-warning" style="width: 200px; height:50px; border:none;">いいね一覧</button>
    </div>
    <div class="col-4 p-2 text-center">
      <button type="button" class="userBtn btn-warning" style="width: 200px; height:50px; border:none;">チャット</button>
    </div>
    <div class="col-4 p-2 text-center">
      <button type="button" class="userBtn btn-warning" style="width: 200px; height:50px; border:none;">購入履歴</button>
    </div>
  </div>

  <form class="d-flex justify-content-center" method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="userBtn btn-warning" type="submit" style="width: 200px; height:50px; border:none;">
      ログアウト
    </button>
  </form>
  
  
<div>