@extends('layouts.master')


@section('title')
    {{ $poster->title}}
@endsection


@section('content')
    <h1>{{ $poster->title }}</h1>
    by {{ $poster->artist }}<br>
    &#36;{{ $poster->cost }}<br>
    {{ $poster->notes }}<br>
    
    <a href='/posters/{{ $poster['id'] }}/edit'>Edit</a> | 
    <a href='/posters/{{ $poster['id'] }}/delete'>Delete</a> |
    <a href='/posters/{{ $poster['id'] }}/sell'>Sell</a>
@endsection