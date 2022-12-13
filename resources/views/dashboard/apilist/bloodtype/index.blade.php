@extends('layouts.main')
<!-- Main Awal -->
@section('container')
    <h3 class="mt-4 border-3 rounded-3 border-bottom">Data API Bloodtype Kecamatan {{ $desa->kecamatan->nama }}, Desa
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
                    <th style='width:16%'>Golongan Darah</th>
                    <th style='width:35%'>Pria</th>
                    <th style='width:10%'>Wanita</th>
                    <th style='width:%'>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bloodtypes as $bloodtype)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bloodtype->bloodtype_name }}</td>
                        <td>{{ $bloodtype->Pria }}</td>
                        <td>{{ $bloodtype->Wanita }}</td>
                        <td>{{ $bloodtype->Total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
