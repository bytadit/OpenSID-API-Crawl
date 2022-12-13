<?php

namespace App\Http\Controllers\Api;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Apilist;
use App\Http\Controllers\Controller;


class KecamatanController extends Controller
{
    public function index(Kecamatan $kecamatan, Desa $desa)
    {
        return view('dashboard.kecamatan.index', [
            'desas' => Desa::where('kecamatan_id', $kecamatan->id)->get(),
            'apilists' => Apilist::all(),
            'kecamatans' => Kecamatan::all(),
            'kecamatan' =>$kecamatan,
            'desa' => $desa,
            'title' => 'List Kecamatan'
        ]);
    }
}
