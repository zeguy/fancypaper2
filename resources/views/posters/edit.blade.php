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

        <div class="form-group">
            <label for='title'>* Title</label>
            <input type='text' class="form-control" name='title' id='title' value='{{ old('title', $poster->title) }}'>
            @include('modules.error-field', ['fieldName' => 'title'])
        </div>

        <div class="form-group">
            <label for='artist'>* Artist</label>
            <input type='text' class="form-control" name='artist' id='artist' value='{{ old('artist', $poster->artist) }}'>
            @include('modules.error-field', ['fieldName' => 'artist'])
        </div>

        <div class="form-group">
            <label for='cost'>* Cost</label>
            <input type='text' class="form-control" name='cost' id='cost' value='{{ old('cost', $poster->cost) }} '>
            @include('modules.error-field', ['fieldName' => 'cost'])
        </div>

        <div class="form-group">
            <label for='image'>* Image URL </label>
            <input type='text' class="form-control" max='4' name='image' id='image' value='{{ old('image', $poster->image) }}'>
            @include('modules.error-field', ['fieldName' => 'image'])
        </div>

        <div class="form-group">
            <label for='notes'>Notes</label>
            <input type='text' class="form-control" name='notes' id='notes' value='{{ old('notes', $poster->notes) }}'>
            @include('modules.error-field', ['fieldName' => 'notes']) 
        </div>
        
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