@extends('layouts.master')

@push('head')
    <link href='/css/fancypaper2.css' rel='stylesheet'>
@endpush

@section('title')
    Sales Record
@endsection

@section('content')
    <section>
        <table class='table table-striped table-bordered'>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Cost</th>
                    <th>Price Sold</th>
                    <th>Platform</th>
                    <th>Profit</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td>{{date('F d, Y', strtotime($sale->created_at))}}</td>
                        <td>{{$sale->title}}</td>
                        <td>{{$sale->artist}}</td>
                        <td>{{$sale->cost}}</td>
                        <td>{{$sale->price}}</td>
                        <td>{{$sale->platform}}</td>
                        <td>{{$sale->profit}}</td>
                        <td>{{$sale->notes}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection