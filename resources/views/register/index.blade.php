@extends('layouts.main')

@section('container')

<section class="mx-auto mt-6 rounded-xl max-w-sm bg-slate-50 shadow-md border-t-4 border-indigo-600">
    <div class="p-10">
        <div class="flex justify-center items-center">
            <img class="w-auto h-16" src="{{ URL::asset('images/opensid_logo.png') }}">
            <div class="ml-2">
                <h1 class="font-semibold text-base">OpenSID</h1>
                <h2 class="text-sm">Desa Digital Terbuka</h2>
            </div>
        </div>

        <form class="space-y-6" action="/register" method="POST">
            @csrf
            <div>
                <label for="name" class="text-slate-700 text-sm @error('username') is-invalid @enderror">Nama Lengkap</label>
                <input id="name" name="name" type="text" required value="{{ old('name') }}" required class="relative block w-full appearance-none rounded border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mt-2">
                <label for="email" class="text-slate-700 text-sm @error('email') is-invalid @enderror">Email</label>
                <input id="email" name="email" type="email" required value="{{ old('email') }}" required class="relative block w-full appearance-none rounded border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mt-2">
                <label for="password" class="text-slate-700 text-sm @error('password') is-invalid @enderror">Kata Sandi</label>
                <input id="password" name="password" type="password" required class="relative block w-full appearance-none rounded border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mt-2">
                <label for="password" class="text-slate-700 text-sm @error('password') is-invalid @enderror">Konfirmasi Kata Sandi</label>
                <input id="password" name="password_confirmation" type="password" required class="relative block w-full appearance-none rounded border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
            </div>

            <div>
                <button type="submit" class="group w-full rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Buat Akun
                </button>
            </div>

            <div class="flex items-center justify-center">
                <div class="text-sm flex gap-1">
                    <p>Sudah punya akun?</p>
                    <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">Masuk</a>
                </div>
            </div>
        </form>
    </div>
</section>


@endsection