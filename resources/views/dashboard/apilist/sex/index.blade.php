@extends('layouts.main')
<!-- Main Awal -->
@section('container')
    <h3 class="mt-4 border-3 rounded-3 border-bottom">Data API Sex Kecamatan {{ $desa->kecamatan->nama }}, Desa
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
                    <th>ID Jenis Kelamin</th>
                    <th>Jenis Kelamin</th>
                    <th>Total</th>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sexes as $sex)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sex->jenis_kelamin_id }}</td>
                        <td>{{ $sex->jenis_kelamin }}</td>
                        <td>{{ $sex->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
