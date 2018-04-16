@extends('layouts.master')

@section('content')
    <h1>New Account</h1><br>

    Already have an account? <a href='/login'>Login here...</a><br><br>

    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            @include('modules.error-field', ['fieldName' => 'name'])
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required>
            @include('modules.error-field', ['fieldName' => 'email'])
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" id="password" type="password" name="password" required>
            @include('modules.error-field', ['fieldName' => 'password'])
        </div>

        <div class="form-group">
            <label for="password-confirm">Confirm Password:</label>
            <input class="form-control" id="password-confirm" type="password" name="password_confirmation" required>
        </div>

        <br>
        
        <button type="submit" class="btn btn-dark">Register</button>
    </form>
    <br>
@endsection
