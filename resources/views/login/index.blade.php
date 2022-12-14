@extends('layouts.main')

@section('container')

<style>
    #login {
        display: none
    }
</style>


@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-100" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="mt-16 flex min-h-full items-center justify-center py-auto sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <div>
            <img class="mx-auto h-28 w-auto" src="{{ asset('images/opensid_logo.png') }}" alt="Your Company">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Desa Digital Terbuka</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                OpenSID
                <span class="font-medium text-indigo-600">Menuju Desa Cerdas</span>
            </p>
        </div>
        <form class="mt-8 space-y-6" action="/login" method="POST">
            {{-- <input type="hidden" name="remember" value="true"> --}}
            @csrf
            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <label for="email" class="sr-only">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Email">
                </div>
                <div>
                    <label for="password" class="sr-only">Kata sandi</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Kata sandi">
                </div>
            </div>

            <div class="flex items-center justify-between">
                {{-- <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900">Ingat saya</label>
                </div> --}}

                <div class="text-sm flex gap-1">
                    <p>Belum punya akun?</p>
                    <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500">Daftar</a>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Masuk
                </button>
            </div>
        </form>
    </div>
</div>


@endsection
