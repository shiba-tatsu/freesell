@extends('layouts.app')

@section('content')
  @include('layouts.nav')
<!-- パンくずリスト -->
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb pl-5">
        <li class="breadcrumb-item"><a href="#">トップページ</a></li>
        <li class="breadcrumb-item"><a href="#">{{$item->category->parent->name}}</a></li>
        <li class="breadcrumb-item"><a href="#">{{$item->category->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$item->name}}</a></li>
    </ol>
  </nav>

  <div class="container">
    <div class="row justify-content-left">
      <div class="justify-content-start col-8 bg-light">
        <div class="row">
          <div class="col-2">
            <ul class="row">
              @foreach($item->images as $img)
                <li class="col-6">
                  <img src="{{$img->image}}" class="small-image">
                </li>
              @endforeach
                </ul>
              </div>

              <div class="col-4">
                <ul>
                  <li>
                    <img src="" class="img-fluid d-block mx-auto big-image">
                  </li>
                </ul>
              </div>
              
              <div class="col-6">
                <h1>{{$item->name}}</h1>
                <a href="{{ route('users.show', ['user' => $item->user->id])}}">{{$item->user->name}}</a>
              </div>
            </div>

            <div class="show mb-5">
              {{$item->body}}
            </div>
            <item-like
              :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))'
              :initial-count-likes='@json($item->count_likes)'
                                  
              :authorized='@json(Auth::check())'
              endpoint="{{ route('items.like', ['item' => $item]) }}">
          </item-like>        
          </div>

          @include('item.item_card')
        </div>

        <div class="border-top border-bottom text-center">
          同じ出品者の他の商品
          <div class="row">
            <div class="col-1">
            </div>
            <div class="col-2">
              <div class="card mb-2 mx-1" style="height: 100px"></div>
            </div>
            <div class="col-2">
              <div class="card mb-2 mx-1" style="height: 100px"></div>
            </div>
            <div class="col-2">
              <div class="card mb-2 mx-1" style="height: 100px"></div>
            </div>
            <div class="col-2">
              <div class="card mb-2 mx-1" style="height: 100px"></div>
            </div>
            <div class="col-2">
              <div class="card mb-2 mx-1" style="height: 100px"></div>
            </div>
            
          </div>
        </div>
        <div class="border-top border-bottom text-center">
          同じ出品者
          <div class="row">
            <div class="col-1">
            </div>
            <div class="col-2">
              <div class="card mb-2 mx-1" style="height: 100px"></div>
            </div>
            <div class="col-2">
              <div class="card mb-2 mx-1" style="height: 100px"></div>
            </div>
            <div class="col-2">
              <div class="card mb-2 mx-1" style="height: 100px"></div>
            </div>
            <div class="col-2">
              <div class="card mb-2 mx-1" style="height: 100px"></div>
            </div>
            <div class="col-2">
              <div class="card mb-2 mx-1" style="height: 100px"></div>
            </div>
            
          </div>
        </div>

        <div class="reviews row">
          @foreach($reviews as $review)
            {{$review->title}}<br>
            {{$review->body}}<br>
            {{$review->user->name}}
            <star-rating :increment="0.5" rating="{{$review->star}}" read-only="true">
            </star-rating><br>
          @endforeach
        </div>

      </div>
@endsection