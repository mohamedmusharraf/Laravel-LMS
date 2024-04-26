@extends('layouts.header')

@section('main')
<style>
    .alert {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
    }

    .alert ul {
        padding-left: 20px;
        margin-bottom: 0;
    }

    .alert li {
        list-style: none;
    }
</style>

<div class="login-container">
    <form action="{{ route('admin.login') }}" method="post">
        @csrf
        <h2>Admin Login</h2>
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