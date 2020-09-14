
@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row">
            <div class="col-3 mr-4 bg-white">
                <h1>検索</h1>
 
                <form action="{{ route('item.refined') }}" method="GET">
                    <p><input type="text" name="keyword" value="{{$keyword}}"></p>
                    <p><input type="number" name="minPrice">以上</p>
                    <p><input type="number" name="maxPrice">以下</p>
                    <p>
                        <input type="checkbox" name="status" value="1" checked="checked">面白い
                        <input type="checkbox" name="status" value="2">役に立つ
                        <input type="checkbox" name="status" value="3">いまいち
                    </p>
                    <p><input type="number" name="delevery_day">以上</p>

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
            {{ $items->appends(Request::all())->links() }}
        </div>
    </div>
@endsection