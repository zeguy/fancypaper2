@extends('layouts.master')

@section('content')

    <header>
        <nav class="navbar navbar-light">
              <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="/posters/index">all</a></li>
                    @foreach ($tagsForCheckboxes as $id => $name)
                        <li><a href="/posters/sorted/{{ $name }}">{{$name}}</a></li>
                    @endforeach  
                </ul>
              </div>
        </nav>
      </header>
@endsection