@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            @foreach ($items as $item)
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-header">{{ $item->name }}</div>
                        <div class="card-body">
                            {{ $item->price }}
                            {{--  ローカルで登録した画像の表示
                            <img src="{{ asset('storage/' . $item->images[0]->image) }}" alt="image" style="width: 30%; height: auto;"/> --}}
                            <img src="{{ $item->images[0]->image }}" alt="image" style="width: 30%; height: auto;"/>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection