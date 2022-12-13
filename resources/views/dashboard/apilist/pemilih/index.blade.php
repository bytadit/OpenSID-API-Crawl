@extends('layouts.main')
<!-- Main Awal -->
@section('container')
    <h3 class="mt-4 border-3 rounded-3 border-bottom">Data API Calon Pemilih Kecamatan {{ $desa->kecamatan->nama }}, Desa
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
                    <th style='width:%'>Pria</th>
                    <th style='width:%'>Wanita</th>
                    </th>
                    <th style='width:%'>Jiwa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemilihs as $pemilih)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pemilih->dusun_name }}</td>
                        <td>{{ $pemilih->rt }}</td>
                        <td>{{ $pemilih->rw }}</td>
                        <td>{{ $pemilih->Lk }}</td>
                        <td>{{ $pemilih->Pr }}</td>
                        <td>{{ $pemilih->Jiwa }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
