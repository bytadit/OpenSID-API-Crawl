@extends('layouts.main')

@section('container')

<style>
  #login{
    display: none
  }
  </style>

<div class="row justify-content-end m-5">
  <div class="col-lg-4 card_login p-4">

      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <main class="form-signin w-100 m-auto d-flex justify-content-evenly flex-column h-100">
          <h1 class="fs-2 mb-3 text-center ">Please <span>Login</span></h1>
          <form action="/login" method="post">
          @csrf
            <div class="form-floating mt-2 box_input box_input_email">
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}"required autofocus>
              <label for="email">Email address</label>
              @error('email')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
          </div>
            <div class="form-floating my-2 box_input box_input_password">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
              <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
            <small class="d-block text-center mt-3">Not Registered? <a style="text-decoration:none" href="/register"><span class="fw-bold">Register Now!</span></a></small>
          </form>
      </main>
  </div>
</div>


@endsection
