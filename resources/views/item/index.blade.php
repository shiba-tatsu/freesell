@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container-fluid">
        <h2 class="text-center mt-4 mb-3">人気のカテゴリー</h2>
        <div class="row justify-content-left">
            <div class="col-4 text-center">
                <img src="https://laraheroherotest.s3.ap-northeast-1.amazonaws.com/yXT3mowYbUep4RkD3vMGohcfFdqgHr4NkOgYrOpn.png" class="ranking-image mb-3" >
                <h4> {{$goldLists[0]->category->parent->name}}</h4>
            </div>
            <div class="col-4 text-center">
                <img src="https://laraheroherotest.s3.ap-northeast-1.amazonaws.com/Dwn9eTmYilSTd3YI4PcPH3HdAEwI3t34E5zSJjtF.png" class="ranking-image mb-3">
                <h4>{{$silverLists[0]->category->parent->name}}</h4>
            </div>
            <div class="col-4 text-center">
                <img src="https://laraheroherotest.s3.ap-northeast-1.amazonaws.com/FZMv5Nd4chYbXjdWfGRNkTg9mo3t54Iy8heK7bnG.png" class="ranking-image mb-3">
                <h4>{{$bronzeLists[0]->category->parent->name}}</h4>
            </div>
        </div>

        <div class="bg-white row pl-5">
            @include('parts.item_index.goldItem')
            @include('parts.item_index.silverItem')
            @include('parts.item_index.bronzeItem')
        </div>
        
    </div>
    @include('layouts.footer')
@endsection