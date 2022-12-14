@extends('layouts.main')
@section('container')
<nav class="bg-white shadow-sm sticky top-0">
    <div class="m-auto max-w-6xl flex justify-between items-center">
        <div class="py-3 flex justify-center items-center">
            <img class="w-auto h-16" src="{{ URL::asset('images/opensid_logo.png') }}">
            <div class="ml-2">
                <h1 class="font-semibold text-base">OpenSID</h1>
                <h2 class="text-sm">Desa Digital Terbuka</h2>
            </div>
        </div>
        <div class="flex justify-between items-center gap-x-10">
            <a href="/dashboard">Dashboard</a>
            <form action="/logout" method="post" class="form-inline m-0 p-0">
                @csrf
                <button type="submit" class="w-auto rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    Keluar
                </button>
            </form>
        </div>
    </div>
</nav>
<div class="rounded-md mt-5 mx-auto max-w-5xl">
    <ol class="list-reset flex">
        <li><a href="/dashboard/kecamatans" class="text-blue-600 hover:text-blue-700">Kecamatan</a></li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li><a href="/dashboard/kecamatans/{{ $kecamatan->url_kecamatan }}/desas" class="text-blue-600 hover:text-blue-700">Kec. {{ $kecamatan->nama }}</a></li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Desa {{ $desa->nama }}</li>
    </ol>
</div>
<div class="bg-white mt-4 flex flex-col max-w-5xl mx-auto h-96 overflow-x shadow-sm rounded-md bg-white">
    <div class="h-96 overflow-x-auto">
        <section class="overflow-hidden text-gray-700 ">
            <div class="container px-4 py-4 mx-auto lg:pt-12 lg:px-32">
                <div class="flex flex-wrap -m-1 md:-m-2">
                    @foreach ($apilists as $apilist)
                    <div class="flex flex-wrap w-1/3">
                        <div class="w-full p-1">
                            <div class="card bg-indigo-600">
                                <div class="card-body">
                                    <h3 class="text-xl font-medium text-white">DATA {{ strtoupper($apilist->path_api) }}</h3>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between hover:bg-indigo-700">
                                    <a class="text-sm text-white flex justify-between items-center w-full" href="/dashboard/kecamatans/{{ $kecamatan->url_kecamatan }}/desas/{{ $desa->url_desa }}/apilists/{{ $apilist->path_api }}">
                                        Lihat Detail
                                        <div><i class="fas fa-angle-right"></i></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</div>
@endsection