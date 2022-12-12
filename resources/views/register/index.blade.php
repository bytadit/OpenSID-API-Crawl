@extends('layouts.main')

@section('container')

<form method="post" action="/register">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name"/>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email"/>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password"/>
    </div>

    <div class="form-group">
        <label for="password_confirmation">Password Confirm:</label>
        <input type="password" class="form-control" name="password_confirmation"/>
    </div>

    <button type="submit" class="btn btn-primary-outline">Register</button>
</form>
<a href='/login' title="Login">Login</a>

@endsection
