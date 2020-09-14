
@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row">
            <div class="col-3 mr-4 bg-white">
                <h1>検索</h1>
 
                <form action="{{ route('item.refined') }}" method="GET">
                    <p>キーワード<br>
                        <input type="text" name="keyword" value="{{$keyword}}">
                    </p>
                    <p>料金<br>
                        <input type="number" name="minPrice">以上
                        <input type="number" name="maxPrice">以下</p>
                    </p>
                    
                    <p>商品の状態<br></p>
                    <div class="row">
                        <div class="col-6"><input type="checkbox" class="status-search" name="status[]" value="1">新品</div>
                        <div class="col-6"><input type="checkbox" class="status-search" name="status[]" value="2">未使用に近い</div>
                        <div class="col-6"><input type="checkbox" name="status[]" value="3">目立った傷や汚れなし</div>
                        <div class="col-6"><input type="checkbox" name="status[]" value="4">やや傷や汚れあり</div>
                        <div class="col-6"><input type="checkbox" name="status[]" value="5">傷や過れあり</div>
                        <div class="col-6"><input type="checkbox" name="status[]" value="6">全体的に状態が悪い</div>
                    </div>
                        
                    <p>発送日<br>
                        <input type="number" name="delevery_day">以内
                    </p>

                    <p><input type="submit" value="検索"></p>
                </form>

            </div>

            <div class="col-8">
                <div class="row justify-content-left">
                    @foreach ($items as $item)
                        <div class="col-md-4 mb-2">
                            <a class="card" href="{{route('item.show', ['item' => $item->id])}}">
                                <div class="card-header">{{ $item->name }}</div>
                                {{ $item->price }}
                                <div class="card-body">
                                    <img src="{{ $item->images[0]->image }}" alt="image" style="width: 30%; height: auto;"/>
                                    
                                </div>
                                <div class="card-body pt-0 pb-2 pl-3">
                                    <div class="card-text">
                                    <item-like
                                        :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))'
                                        :initial-count-likes='@json($item->count_likes)'
                                        
                                        :authorized='@json(Auth::check())'
                                        endpoint="{{ route('items.like', ['item' => $item]) }}"
                                        >
                                    </item-like>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            {{$items->appends(['keyword' => Request::get('keyword')])->links() }}
        </div>
    </div>
@endsection