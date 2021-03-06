
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

  <div class="container-fluid mt-4">
    <div class="row justify-content-left bg-white py-4">
      <div class="justify-content-start col-8 ">
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
                  <img src="{{$item->images[0]->image}}" class="img-fluid d-block mx-auto big-image">
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

            @include('parts.item_show.table')
            
            <item-like
              :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))'
              :initial-count-likes='@json($item->count_likes)'
                                  
              :authorized='@json(Auth::check())'
              endpoint="{{ route('items.like', ['item' => $item]) }}">
            </item-like>

      </div>

          @include('parts.item_show.item_card')
        </div>

        @include('parts.item_show.same_user_items')
        @include('parts.item_show.same_category_items')

        @include('parts.item_show.reviews')

      </div>
  @include('layouts.footer')
@endsection