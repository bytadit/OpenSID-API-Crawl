{{-- @extends('dashboard.layouts.main') --}}
@extends('layouts.main')
<!-- Main Awal -->
@section('container')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard API</li>
    </ol>
    <div class="row">
        <div class="col-xl-6 col-md-6">
            @foreach ($kecamatans as $kecamatan)
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h3 class="text-white">Kecamatan {{ $kecamatan->nama }}</h3>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/dashboard/kecamatans/{{ $kecamatan->url_kecamatan }}/desas">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <div>Survey Belum Terisi</div>
                    <h3 class="text-white">{{ $survey_undone->count() }}</h3>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/dashboard/mysurveys">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-xl-3 col-md-6">
            <div class="card bg-bts-3 text-white mb-4">
                <div class="card-body">
                    <div>Survey Terisi</div>
                    <h3 class="text-white">{{ $survey_done->count() }}</h3>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/dashboard/mysurveys">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div> --}}

    </div>
</div>
@endsection
<!-- Main Akhir -->

<!-- Footer Awal -->
{{-- @section('footer')
<footer class="py-4 bg-light mt-auto">
<div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted">Copyright &copy; {{ $configs->company }} <span id="copyright"></span> </div>
    </div>
</div>
<script>
    document.getElementById('copyright').innerHTML = new Date().getFullYear();
</script>
</footer>
@endsection --}}
<!-- Footer Akhir -->
