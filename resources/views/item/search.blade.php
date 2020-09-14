
@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    <div class="container">
        <div class="row">
            @include('item.refined_search_form')

            @include('item.displayed_items')
        </div>
        <div class="row justify-content-center">
            {{$items->appends(['keyword' => Request::get('keyword')])->links() }}
        </div>
    </div>
@endsection