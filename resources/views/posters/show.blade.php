@extends('layouts.master')

@push('head')
    <link href='/css/show.css' rel='stylesheet'>
@endpush

@section('title')
    {{ $poster->title }}
@endsection


@section('content')
    <h1>{{ $poster->title }}</h1>
    by {{ $poster->artist }}<br>
    &#36;{{ $poster->cost }}<br>
    notes: {{ $poster->notes }}<br>
@endsection