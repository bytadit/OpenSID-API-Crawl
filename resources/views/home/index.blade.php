@extends('layouts.main')

@section('container')

    <form action="/logout" method="post">
        @csrf
        <button type="submit">LogOut</button>
    </form>

<div class="container-fluid mb-5" style="margin-bottom: 150px !important">
    <div class="row mr-4">

            <ul>
                <a href="/bloodtypes">API BloodTypes</a>
            </ul>
            <ul>
                <a href="/populations">API Populations</a>
            </ul>
            <ul>
                <a href="/pemilih">API Pemilih</a>
            </ul>
            <ul>
                <a href="/sex">API Sex</a>
            </ul>

    </div>
</div>
@endsection
