@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container-fluid">
            <h2 class="text-center mt-4 mb-3">人気のカテゴリー</h2>
            <div class="row justify-content-left">
                <div class="col-4 text-center">
                    <img src="https://frame-illust.com/fi/wp-content/uploads/2015/02/d2b697b8c5e98aeb37b4caa48729b5ca.png" class="ranking-image mb-3" >
                    <h4> {{$goldLists[0]->category->parent->name}}</h4>
                </div>
                <div class="col-4 text-center">
                    <img src="https://frame-illust.com/fi/wp-content/uploads/2015/02/bde6ddc8a65ea5436bed9ac7600eba05.png" class="ranking-image mb-3">
                    <h4>{{$silverLists[0]->category->parent->name}}</h4>
                </div>
                <div class="col-4 text-center">
                    <img src="https://frame-illust.com/fi/wp-content/uploads/2015/02/b211351e2eabde63f5c8656807735a5b.png" class="ranking-image mb-3">
                    <h4>{{$bronzeLists[0]->category->parent->name}}</h4>
                </div>
            </div>

            <!-- 人気ランキングの商品-->
            <div class="bg-white pl-5">
                @include('parts.item_index.goldItem')
                @include('parts.item_index.silverItem')
                @include('parts.item_index.bronzeItem')
            </div>
        
    </div>
    @include('layouts.footer')
@endsection