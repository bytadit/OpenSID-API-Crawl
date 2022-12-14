@extends('layouts.main')
<!-- Main Awal -->
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
        <li><a href="/dashboard/kecamatans/{{ $kecamatan->url_kecamatan }}/desas" class="text-blue-600 hover:text-blue-700">Kec. {{ $desa->kecamatan->nama }}</a></li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li><a href="/dashboard/kecamatans/{{ $kecamatan->url_kecamatan }}/desas/{{ $desa->url_desa }}/apilists" class="text-blue-600 hover:text-blue-700">Desa {{ $desa->nama }}</a></li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Data Populasi</li>
    </ol>
</div>

<div class="mt-4 flex flex-col max-w-5xl mx-auto h-96 overflow-x bg-white shadow-sm">
    <div class="h-96 overflow-x-auto">
        <table class="min-w-full">
            <thead class="border-b bg-indigo-600">
                <tr>
                    <th scope="col" class="text-md font-medium text-white px-6 py-4 text-left">
                        #
                    </th>
                    <th scope="col" class="text-md font-medium text-white px-6 py-4 text-left">
                        Desa
                    </th>
                    <th scope="col" class="text-md font-medium text-white px-6 py-4 text-left">
                        RT
                    </th>
                    <th scope="col" class="text-md font-medium text-white px-6 py-4 text-left">
                        RW
                    </th>
                    <th scope="col" class="text-md font-medium text-white px-6 py-4 text-left">
                        Jumlah Kartu Keluarga
                    </th>
                    <th scope="col" class="text-md font-medium text-white px-6 py-4 text-left">
                        Pria
                    </th>
                    <th scope="col" class="text-md font-medium text-white px-6 py-4 text-left">
                        Wanita
                    </th>
                    <th scope="col" class="text-md font-medium text-white px-6 py-4 text-left">
                        Total Jiwa
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($populations as $population)
                <tr class="border-b bg-white">
                    <td class="text-md px-4 py-4 whitespace-nowrap">
                        {{ $loop->iteration }}
                    </td>
                    <td class="text-md px-4 py-4 whitespace-nowrap">
                        {{ $population->dusun_name }}
                    </td>
                    <td class="text-md px-4 py-4 whitespace-nowrap">
                        {{ $population->rt }}
                    </td>
                    <td class="text-md px-4 py-4 whitespace-nowrap">
                        {{ $population->rw }}
                    </td>
                    <td class="text-md px-4 py-4 whitespace-nowrap">
                        {{ $population->jumlah_kk }}
                    </td>
                    <td class="text-md px-4 py-4 whitespace-nowrap">
                        {{ $population->pria }}
                    </td>
                    <td class="text-md px-4 py-4 whitespace-nowrap">
                        {{ $population->wanita }}
                    </td>
                    <td class="text-md px-4 py-4 whitespace-nowrap">
                        {{ $population->total_pw }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="bg-white max-w-5xl mx-auto overflow-x shadow-sm border-t-2 border-indigo-600 p-4">
    <h5 class="font-medium leading-tight text-xl mt-0 mb-2 text-indigo-600">Statistik Populasi Desa {{ $desa->nama }}</h5>
    {!! $chart->container() !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}
</div>

@endsection
{{-- @section('page-scripts') --}}
{{-- @endsection --}}