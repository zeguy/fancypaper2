@extends('layouts.master')

@section('content')

    <h1>Login</h1>

    Don't have an account? <a href='/register'>Register here...</a>

    <form method="POST" action="{{ route('login') }}">

        {{ csrf_field() }}
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @include('modules.error-field', ['fieldName' => 'email'])
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" id="password" type="password" name="password" required>
            @include('modules.error-field', ['fieldName' => 'password'])
        </div>

        <div class="form-group">
            <label>
                Remember me:<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
            </label>
        </div>

        <button type="submit" class="btn btn-dark">Login</button> <br>

        <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a>
        
    </form>

@endsection
