@extends('layouts.master')

@push('head')
    <link href='/css/fancypaper2.css' rel='stylesheet'>
@endpush

@section('title')
    Sales Record
@endsection

@section('content')
	
    <section id="sold">
        @foreach($sales as $sale)
                {{$sale}} <br>
        @endforeach
    </section>
@endsection