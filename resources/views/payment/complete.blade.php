@extends('layouts.app')

@section('content')
@include('layouts.nav')
    <div class="container mt-4">
        <div class="row justify-content-center" style="margin-bottom:10px;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body mx-auto">
                        <h5 class="mb-5">購入完了しました！</h5>

                        <a href="{{route('item.index')}}">
                            トップページへ戻る
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection