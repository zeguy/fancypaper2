@extends('layouts.master')

@section('title')
    Edit Poster {{ $poster->title }}
@endsection

@section('content')
    <h1>Edit Poster {{ $poster->title }}</h1>

    <form method='POST' action='/posters/{{ $poster->id }}'>

        {{ method_field('put') }}
        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <label for='title'>* Title</label>
        <input type='text' name='title' id='title' value='{{ old('title', $poster->title) }}'>
        @include('modules.error-field', ['fieldName' => 'title'])

        <label for='artist'>* Artist</label>
        <input type='text' name='artist' id='artist' value='{{ old('artist', $poster->artist) }}'>
        @include('modules.error-field', ['fieldName' => 'artist'])

        <label for='variant'>Variant</label>
        <input type='checkbox' name='variant' id='variant' value='variant'>

        <label for='cost'>* cost</label>
        <input type='text' name='cost' id='cost' value='{{ old('cost', $poster->cost) }} '>
        @include('modules.error-field', ['fieldName' => 'cost'])

        <label for='image'>* Image URL </label>
        <input type='text' max='4' name='image' id='image' value='{{ old('image', $poster->image) }}'>
        @include('modules.error-field', ['fieldName' => 'image']) 
        
        @foreach ($tagsForCheckboxes as $id => $name)
            <input
                type='checkbox'
                value='{{ $id }}'
                name='tags[]'
                {{ (isset($tagsForThisPoster) and in_array($name, $tagsForThisPoster)) ? 'CHECKED' : '' }}
            >
            {{ $name }} <br>
        @endforeach                
             

        <input type='submit' value='Save changes' class='btn btn-primary btn-small'>
    </form>
@endsection