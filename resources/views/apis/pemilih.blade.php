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
                        <th>Pria</th>
                        <th>Wanita</th>
                        <th>Total Jiwa</th>
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
                        <td>{{ $body->Lk }}</td>
                        <td>{{ $body->Pr }}</td>
                        <td>{{ $body->Jiwa }}</td>
                        {{-- <td>
                            <a href="/dashboard/edit-owner/{{ $owner->id }}/edit" class="edit" title="Edit" data-toggle="tooltip">
                                <i class="material-icons">
                                    &#xE254;
                                </i>
                            </a>
                            <form action="/dashboard/edit-owner/{{ $owner->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
