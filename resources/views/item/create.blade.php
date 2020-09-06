@extends('layouts.app')

@section('content')
<div class="container bg-light">
  <form method='POST' action="{{ route('item.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="file">出品画像</label>
      @for($i = 0 ; $i < 3; $i ++)
        <input type="file" id="image" name='image[]' class="form-control-file" multiple>
      @endfor
      
      
      <small id="emailHelp" class="form-text text-muted">あなたに関する個人情報を収集することはありません。</small>
    </div>

    <div class="form-group">
      <label for="name">タイトル (100文字まで)</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="商品名">
    </div>

    <div class="form-group">
      <label for="item-description">商品の説明 (1000文字まで)</label>
      <textarea class="form-control" id="item-description" rows="5" name="body" placeholder="test"></textarea>
    </div>

    <div class="form-group">
      <label for="category">カテゴリー</label>
      <div class="row">
        <select v-model="selectedKey" v-on:change="selected" class="form-control col-3 mr-3 ml-3">
          <option v-for="(value, key) in items">
            @{{ key }}
          </option>
        </select>
        
        <select name="category_id" class="form-control col-3">
          <option v-if="selectedItem" v-for="item in selectedItem" :value="item.id">
            @{{ item.name }}
          </option>
        </select>
      </div>
    </div>
    
  
    <div class="form-group">
      <label for="item_status">商品の状態</label>
      <input type="number" class="form-control" id="item_status" name="status">
      <small id="emailHelp" class="form-text text-muted">あなたに関する個人情報を収集することはありません。</small>
    </div>
  
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
      <input type="text" class="form-control" id="region" name="region">
      <small id="emailHelp" class="form-text text-muted">あなたに関する個人情報を収集することはありません。</small>
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

    <input type='submit' class='btn btn-primary' value='商品を出品'>

  </form>
</div>
@endsection