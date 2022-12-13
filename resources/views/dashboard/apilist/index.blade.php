@extends('layouts.main')
@section('container')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard API</li>
                </ol>
            </div>
            <div class="col-lg-2">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Log Out</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6">
                @foreach ($apilists as $apilist)
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <div>API {{ $apilist->id }}</div>
                            <h3 class="text-white">{{ strtoupper($apilist->path_api) }}</h3>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link"
                                href="/dashboard/kecamatans/{{ $kecamatan->url_kecamatan }}/desas/{{ $desa->url_desa }}/apilists/{{ $apilist->path_api }}">View
                                APIs</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
