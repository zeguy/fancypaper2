@extends('layouts.master')

@section('title')
    New Poster
@endsection

@section('content')
    <h1>Add a poster</h1>

    <form method='POST' action='/posters'>

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='title'>* Title</label>
        <input type='text' name='title' id='title' value='{{ old('title', 'Savages') }}'>
        @include('modules.error-field', ['fieldName' => 'title'])

        <label for='artist'>* Artist</label>
        <input type='text' name='artist' id='artist' value='{{ old('artist', 'Don Winslow') }}'>
        @include('modules.error-field', ['fieldName' => 'artist'])

        <label for='variant'>Variant</label>
        <input type='checkbox' name='variant' id='variant' value='Variant'>

        <label for='cost'>* cost</label>
        <input type='number' name='cost' id='cost' value='{{ old('cost', '\044 ') }}'>
        @include('modules.error-field', ['fieldName' => 'cost'])

        <label for='image'>* Image URL </label>
        <input type='text' max='4' name='image' id='image' value='{{ old('image', 'http://d28hgpri8am2if.cloudfront.net/book_images/cvr9781439183373_9781439183373.jpg') }}'>
        @include('modules.error-field', ['fieldName' => 'image'])        

        <input type='submit' value='Add Poster' class='btn btn-primary btn-small'>
    </form>
@endsection