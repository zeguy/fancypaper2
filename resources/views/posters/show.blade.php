@extends('layouts.master')

@push('head')
    <link href='/css/show.css' rel='stylesheet'>
@endpush

@section('title')
    {{ $poster->title}}
@endsection


@section('content')
    <h1>{{ $poster->title }}</h1>
    by {{ $poster->artist }}<br>
    &#36;{{ $poster->cost }}<br>
    notes: {{ $poster->notes }}<br>
    
    <a class="btn btn-primary" href='/posters/{{ $poster['id'] }}/edit'>Edit</a>
    <a class="btn btn-default" href='/posters/{{ $poster['id'] }}/sell'>Sell</a> 
    <a class="btn btn-danger" href='/posters/{{ $poster['id'] }}/delete'>Delete</a>
@endsection