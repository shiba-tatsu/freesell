@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container bg-light">
  <form method='POST' action="{{ route('item.update', ['item' => $item->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    @include('parts.item_form.itemForm')

    <div class="d-flex justify-content-center">
      <input type='submit' class='btn btn-primary' value='商品を編集' style="width:1000px;">
    </div>

  </form>
</div>
@endsection