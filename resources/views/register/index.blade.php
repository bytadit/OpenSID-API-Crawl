@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-5 card_register p-4">
            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Registration <span>Form</span></h1>
                <form action="/register" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            name="username" placeholder="username" required value={{ old('username') }}>
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mt-2">
                        <input type="text" class="form-control rounded-top @error('firstName') is-invalid @enderror"
                            id="firstName" name="firstName" placeholder="Nama Depan" required value={{ old('firstName') }}>
                        <label for="firstName">Nama Depan</label>
                        @error('firstName')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mt-2">
                        <input type="text" class="form-control rounded-top @error('lastName') is-invalid @enderror"
                            id="lastName" name="lastName" placeholder="Nama Belakang" required value={{ old('lastName') }}>
                        <label for="lastName">Nama Belakang</label>
                        @error('lastName')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mt-2">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Email" required value={{ old('email') }}>
                        <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4 mt-2">
                        <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Password" required value={{ old('password') }}>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4 mt-2">
                        <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror"
                            id="password" name="password_confirmation" placeholder="Password" required
                            autocomplete="current-password">
                        <label for="password">Confirm Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-success" type="submit">Register</button>
                    <small class="d-block text-center my-3">Already Registered? <a href="/login">Login</a></small>
                </form>
            </main>
        </div>
    </div>
@endsection
