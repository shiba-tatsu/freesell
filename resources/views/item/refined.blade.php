@extends('layouts.app')

@section('content')
    @include('layouts.nav')
    @include('parts.search.search_main')
    
    <div class="row justify-content-center">
        {{ $items->appends(Request::all())->links() }}
    </div>

    @include('layouts.footer')
@endsection