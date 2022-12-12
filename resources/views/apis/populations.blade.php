@extends('layouts.main')

@section('container')

    <form action="/logout" method="post">
        @csrf
        <button type="submit">LogOut</button>
    </form>

<div class="container-fluid mb-5" style="margin-bottom: 150px !important">
    <div class="row mr-4">
        <div class="table-responsive col-lg-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Dusun</th>
                        <th>Nama Dusun</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Jumlah KK</th>
                        <th>Pria</th>
                        <th>Wanita</th>
                        <th>Total</th>
                        <!-- <th>Pembuat Data</th> -->
                        <!-- <th>Waktu Dibuat</th> -->
                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bodies->data as $body)
                    <tr>
                        <td>{{ $body->DusunID }}</td>
                        <td>{{ $body->DusunName }}</td>
                        <td>{{ $body->RT }}</td>
                        <td>{{ $body->RW }}</td>
                        <td>{{ $body->Jumlah_KK }}</td>
                        <td>{{ $body->Pria }}</td>
                        <td>{{ $body->Wanita }}</td>
                        <td>{{ $body->Total_PW }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
