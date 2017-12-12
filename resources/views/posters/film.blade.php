@extends('layouts.master')

@push('head')
    <link href='/css/fancypaper2.css' rel='stylesheet'>
@endpush

@section('title')
    Posters
@endsection

@section('subNav')

    <header>
		<nav class="navbar navbar-light">
      		<div class="container-fluid">
        		<ul class="nav navbar-nav">
                    <li><a href="/posters/index">all</a></li>
                    @foreach ($tagsForCheckboxes as $id => $name)
                        <li><a href="/posters/{{ $name }}">{{$name}}</a></li>
                    @endforeach  
        		</ul>
      		</div>
    	</nav>
  	</header>
@endsection

@section('content')

    <section id="photos">
        @foreach($posters as $poster)
            <a href='/posters/{{ $poster['id'] }}'>
                <img src='{{ $poster['image'] }}'>
            </a>
        @endforeach
    </section>
@endsection