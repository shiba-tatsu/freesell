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
                            {{ $item->images[0]->image }}
                            <img src="{{ $item->images[0]->image }}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


$item = new Item();
        $item->image = base64_encode(file_get_contents($request->image));
        $item->status = $request->input('status');
        $item->name = $request->input('name');
        $item->body = $request->input('body');
        $item->price = $request->input('price');
        $item->fee = $request->input('fee');
        $item->region = $request->input('region');
        $item->delivery_day = $request->input('delivery_day');
        $item->quantity = $request->input('quantity');
        $item->seller_id = $request->user()->id;
        $item->save();