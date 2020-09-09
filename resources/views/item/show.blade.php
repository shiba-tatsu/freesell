@extends('layouts.app')

@section('content')
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
                <a href="{{ route('users.show', ['id' => $item->user->id])}}">{{$item->user->name}}</a>
              </div>
            </div>

            <div class="show mb-5">
              {{$item->body}}
            </div>         
          </div>

          <div class="col-4 bg-white px-5 py-3">
            <div class="card" style="height: 270px">
              <div class="leftovers my-2 text-center">
                残り: {{$item->quantity}}品
              </div>
              <div class="price my-2 text-center">
                {{$item->price}}円(税込)
              </div>
              <button class="btn bg-primary mt-5 mx-3">
                購入
              </button>
              <button class="btn bg-primary mt-4 mx-3">
                カートに入れる
              </button>

              </div>
            </div>
          </div>
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

      </div>
@endsection