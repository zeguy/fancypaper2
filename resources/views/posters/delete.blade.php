@extends('layouts.master')

@section('title')
    Delete Poster {{ $poster->title }}
@endsection

@section('content')
    <h1>Are you sure you want to delete {{ $poster->title }}?</h1>

    <form method='POST' action='/posters/{{ $poster->id }}'>

        {{ method_field('put') }}
        {{ csrf_field() }}

        <input type='submit' value='yes' class='btn btn-primary btn-small'>
        <a class="btn" href="/posters/{{ $poster->id }}">No!</a>
        
    </form>
@endsection