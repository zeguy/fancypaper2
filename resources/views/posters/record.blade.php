@extends('layouts.master')

@push('head')
    <link href='/css/fancypaper2.css' rel='stylesheet'>
@endpush

@section('title')
    Sales Record
@endsection

@section('content')
	
    <section id="sold">
        <table>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Variant</th>
                <th>Cost</th>
                <th>Price Sold</th>
                <th>Platform</th>
                <th>Profit</th>
            </tr>
        @foreach($sales as $sale)
            <tr>
                <td>{{$sale->title}}</td>
                <td>{{$sale->artist}}</td>
                <td>{{$sale->variant}}</td>
                <td>{{$sale->cost}}</td>
                <td>{{$sale->price}}</td>
                <td>{{$sale->platform}}</td>
                <td>{{$sale->profit}}</td>
            </tr>
        @endforeach
    </section>
@endsection