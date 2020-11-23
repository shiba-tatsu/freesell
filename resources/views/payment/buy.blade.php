@extends('layouts.app')

@section('content')
@include('layouts.nav')
    <div class="container mt-4">
        <div class="row justify-content-center" style="margin-bottom:10px;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        お届け先入力
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('payment.pay')}}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">氏名</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="postalcode">郵便番号</label>
                                    <input id="postalcode" type="text" class="form-control" name="postal" value="{{ old('postalcode') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="region">都道府県</label>
                                    <select id="region" class="form-control" name="region">
                                        @foreach(Config::get('region') as $regionIndex => $value)
                                            <option value={{ $regionIndex }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row mb-1">
                                <div class="form-group col-md-6">
                                    <label for="addressline1">市町区村</label>
                                    <input id="addressline1" type="text" class="form-control" name="city">
                                </div>
                            </div>

                            <div class="form-row mb-1">
                                <div class="form-group col-md-6">
                                    <label for="addressline2">住所</label>
                                    <input id="addressline2" type="text" class="form-control" name="address">
                                </div>
                            </div>

                            <div class="form-row mb-1">
                                <div class="form-group col-md-6">
                                    <label for="phonenumber">電話番号</label>
                                    <input id="phonenumber" type="text" class="form-control" name="phonenumber">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <input type="hidden" name="item_id" value="{{$request->item_id}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="quantity" value="{{$request->item_quantity}}">
                                    <input type="hidden" name="item_price" value={{$request->item_price}}>
                                    <input type="hidden" name="item_fee" value={{$request->item_fee}}>
                                    <button type="submit" class="btn btn-primary">購入する</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ $request->item_name }}
                    </div>
                    <div class="card-body">
                      <div>
                        {{ $request->item_price }}円
                      </div>
                      <div>
                        {{ $request->item_quantity }}品
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection