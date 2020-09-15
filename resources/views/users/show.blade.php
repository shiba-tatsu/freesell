@extends('layouts.app')

@section('content')
@include('layouts.nav')

<div>
  test
  <item_edit>
  </item_edit>

  <review_modal>
  </review_modal>
</div>

<form id="logout-button" method="POST" action="{{ route('logout') }}">
  @csrf
  <button form="logout-button" class="dropdown-item" type="submit">
    ログアウト
  </button>
</form>
@endsection

