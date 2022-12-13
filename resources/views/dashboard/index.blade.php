@extends('layouts.main')
<!-- Main Awal -->
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
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <h3 class="text-white">{{ $kecamatans->count() }} Kecamatan</h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/dashboard/kecamatans/">View All</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
