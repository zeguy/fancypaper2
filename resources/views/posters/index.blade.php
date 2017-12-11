@extends('layouts.master')

@push('head')
    <link href='/css/fancypaper2.css' rel='stylesheet'>
@endpush

@section('title')
    Posters
@endsection

@section('content')
	
    <header>
		<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      		<div class="container-fluid">
        		<ul class="nav navbar-nav">
                    <li><a href="/posters/index">Collection</a></li>
                    <li><a href="/posters/inventory">Inventory</a></li>
        		</ul>
      		</div>
    	</nav>
  	</header>

    <section id="photos">
        @foreach($posters as $poster)
            <a href='/posters/{{ $poster['id'] }}'>
                <img src='{{ $poster['image'] }}'>
            </a>
        @endforeach
    </section>
@endsection