@extends('posters.nav')

@push('head')
    <link href='/css/fancypaper2.css' rel='stylesheet'>
@endpush

@section('title')
    Posters
@endsection

@section('content')
    @parent

    <section id="photos">
        @foreach($posters as $poster)
            <a href='/posters/{{ $poster['id'] }}'>
                <img src='{{ $poster['image'] }}' alt='{{ $poster['name'] }}'>
            </a>
        @endforeach
    </section>
@endsection