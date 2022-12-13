@extends('layouts.main')
<!-- Main Awal -->
@section('container')
    <h3 class="mt-4 border-3 rounded-3 border-bottom">Data API Bloodtype Kecamatan {{ $desa->kecamatan->nama }}, Desa {{ $desa->nama }}</h3>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <div class="table-responsive col-lg-12">
    {{-- <a href="/dashboard/providers/create"   class="btn border-0 btn-success add-new mb-4" style="background: #52784F; color: #fff"><i class="fa fa-plus"></i> Add New</a> --}}
    <table class="table fixedTable text-center">
        <thead class="bg-bts-3 text-dark">
            <tr>
                <th style='width:3.8%;border-top-left-radius:1rem'>No</th>
                <th style='width:16%'>Golongan Darah</th>
                <th style='width:35%'>Pria</th>
                <th style='width:10%'>Wanita</th>
                <th style='width:%'>Total</th>
                {{-- <th style='width:70px;border-top-right-radius:1rem'>Aksi</th> --}}
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
                {{-- <td class='text-start'>{{ $provider->alamat }}</td> --}}
                {{-- <td>{{ $provider->noTelp }}</td> --}}
                {{-- <td class='text-start'>
                    @if($provider->btslists)
                        <ul>
                            @foreach($provider->btslists as $btslistProvider)
                                <li>{{ $btslistProvider->nama }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>None</p>
                    @endif
                </td> --}}
                {{-- <td class='text-center align-middle'>
                    <a href="/dashboard/providers/{{ $provider->id }}/edit" class="edit badge bg-warning" title="Edit" data-toggle="tooltip">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="/dashboard/providers/{{ $provider->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" title="Delete" data-toggle="tooltip" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>

    </div>
@endsection
{{-- @section('page-scripts') --}}
{{-- @endsection --}}