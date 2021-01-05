@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container bg-light mb-3">
  <form method='POST' action="{{ route('item.store') }}" enctype="multipart/form-data">
    @csrf
    @include('parts.item_form.itemForm')

    <div class="d-flex justify-content-center">
      <input type='submit' class='btn btn-primary' value='商品を出品' style="width:1000px;">
    </div>

  </form>
</div>
@include('layouts.footer')
@endsection