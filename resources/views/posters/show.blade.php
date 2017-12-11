@extends('layouts.master')


@section('title')
    {{ $poster->title}}
@endsection


@section('content')
    <h1>{{ $poster->title }}</h1>
    by {{ $poster->artist }}
    {{ $poster->variant }}
    {{ $poster->cost }}
    
    <a href='/posters/{{ $poster['id'] }}/edit'>Edit</a> | 
    <a href='/posters/{{ $poster['id'] }}/delete'>Delete</a> |
    <a href='/posters/{{ $poster['id'] }}/sell'>Sell</a>
@endsection