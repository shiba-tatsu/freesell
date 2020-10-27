@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container bg-light mb-3">
  <form method='POST' action="{{ route('item.store') }}" enctype="multipart/form-data">
    @csrf
    <image-form class="mt-4 mx-3">
    </image-form>

    <div class="form-group">
      <label for="name">タイトル (100文字まで)</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="商品名">
    </div>

    <div class="form-group">
      <label for="item-description">商品の説明 (1000文字まで)</label>
      <textarea class="form-control" id="item-description" rows="5" name="body" placeholder="test"></textarea>
    </div>

    <category>
    </category>
    
    <div class="form-group">
      <label for="status">商品送料の負担</label>
      <select id="status" class="form-control" name="status">
        @foreach(Config::get('status') as $statusIndex => $value)
            <option value={{ $statusIndex }}>{{ $value }}</option>
        @endforeach
      </select>
    </div>
    
    {{--<div class="form-group">
      <label for="item_status">商品の状態</label>
      <input type="number" class="form-control" id="item_status" name="status">
      <small id="emailHelp" class="form-text text-muted">あなたに関する個人情報を収集することはありません。</small>
    </div>--}}
  
    <div class="form-group">
      <label for="fee">商品送料の負担</label>
      <input type="number" class="form-control" id="fee" name="fee">
      <small id="emailHelp" class="form-text text-muted">あなたに関する個人情報を収集することはありません。</small>
    </div>
  
    <div class="form-group">
      <label for="delivery_day">発送までの日数</label>
      <input type="number" class="form-control" id="delivery_day" name="delivery_day">
      <small id="emailHelp" class="form-text text-muted">あなたに関する個人情報を収集することはありません。</small>
    </div>

    <div class="form-group">
      <label for="fee">発送元の地域</label>
      <select id="region" class="form-control" name="region">
        @foreach(Config::get('region') as $regionIndex => $value)
            <option value={{ $regionIndex }}>{{ $value }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="quantity">商品の数</label>
      <input type="number" class="form-control" id="quantity" name="quantity">
      <small id="emailHelp" class="form-text text-muted">あなたに関する個人情報を収集することはありません。</small>
    </div>

    <div class="form-group">
      <label for="price">商品の値段</label>
      <input type="number" class="form-control" id="price" name="price">
      <small id="emailHelp" class="form-text text-muted">あなたに関する個人情報を収集することはありません。</small>
    </div>

    <div class="d-flex justify-content-center">
      <input type='submit' class='btn btn-primary' value='商品を出品' style="width:1000px;">
    </div>

  </form>
</div>
@include('layouts.footer')
@endsection