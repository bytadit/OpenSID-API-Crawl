@extends('layouts.main')
<!-- Main Awal -->
@section('container')
    <h3 class="mt-4 border-3 rounded-3 border-bottom">Data API Populasi Kecamatan {{ $desa->kecamatan->nama }}, Desa
        {{ $desa->nama }}</h3>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="table-responsive col-lg-12">
        <table class="table fixedTable text-center">
            <thead class="bg-bts-3 text-dark">
                <tr>
                    <th style='width:3.8%;border-top-left-radius:1rem'>No</th>
                    <th style='width:16%'>Nama Desa</th>
                    <th style='width:10%'>RT</th>
                    <th style='width:10%'>RW</th>
                    <th style='width:%'>Jumlah KK</th>
                    <th style='width:%'>Pria</th>
                    <th style='width:%'>Wanita</th>
                    </th>
                    <th style='width:%'>Jiwa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($populations as $population)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $population->dusun_name }}</td>
                        <td>{{ $population->rt }}</td>
                        <td>{{ $population->rw }}</td>
                        <td>{{ $population->jumlah_kk }}</td>
                        <td>{{ $population->pria }}</td>
                        <td>{{ $population->wanita }}</td>
                        <td>{{ $population->total_pw }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
