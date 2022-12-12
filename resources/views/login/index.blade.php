@extends('layouts.main')

@section('container')

<form method="post" action="/login">
    @csrf
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" name="email"/>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password"/>
    </div>

    <button type="submit" class="btn btn-primary-outline">Login</button>
</form>
@endsection
