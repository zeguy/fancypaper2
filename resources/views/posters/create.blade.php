@extends('layouts.master')

@section('title')
    New Poster
@endsection

@section('content')
    <h1>Add a poster</h1>

    <form method='POST' action='/posters'>

        {{ csrf_field() }}

        <div class='details'>* Required fields</div>
        
        <div class="form-group">
            <label for='title'>* Title</label>
            <input type='text' class="form-control" name='title' id='title' value='{{ old('title', 'Title') }}'>
            @include('modules.error-field', ['fieldName' => 'title'])
        </div>

        <div class="form-group">
            <label for='artist'>* Artist</label>
            <input type='text' class="form-control" name='artist' id='artist' value='{{ old('artist', 'Artist') }}'>
            @include('modules.error-field', ['fieldName' => 'artist'])
        </div>

        <div class="form-group">
            <label for='cost'>* cost</label>
            <input type='number' class="form-control" name='cost' id='cost' value='{{ old('cost') }}'>
            @include('modules.error-field', ['fieldName' => 'cost'])
        </div>

        <div class="form-group">
            <label for='image'>* Image URL </label>
            <input type='text' class="form-control" name='image' id='image' value='{{ old('image') }}'>
            @include('modules.error-field', ['fieldName' => 'image'])
        </div>

        <div class="form-group">
            <label for='notes'>Notes</label>
            <input type='text' class="form-control" name='notes' id='notes' value='{{ old('notes', 'Notes') }}'>
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

        <input type='submit' value='Add Print' class='btn btn-primary btn-small'>
    </form>
@endsection