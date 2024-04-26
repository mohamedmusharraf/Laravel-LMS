@extends('layouts.header')

@section('main')

<div class="login-container">
<form action="{{ route('user.login') }}" method="post"> 
        @csrf
        <h2>User Login</h2> 
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="submit">Login</button>
    </form>
</div>

@endsection