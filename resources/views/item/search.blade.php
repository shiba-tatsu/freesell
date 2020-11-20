@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    {{env('APP_NAME')}}
    test
    @include('parts.search.search_main')
    
    <div class="row justify-content-center">
        {{$items->appends(['keyword' => Request::get('keyword')])->links() }}
    </div>

    @include('layouts.footer')
@endsection