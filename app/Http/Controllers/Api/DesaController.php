<?php

namespace App\Http\Controllers\Api;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Apilist;
use App\Http\Controllers\Controller;

class DesaController extends Controller
{
    public function index(Apilist $apilist, Desa $desa, Kecamatan $kecamatan)
    {
        return view('dashboard.desa.index', [
            'desas' => Desa::where('kecamatan_id', $kecamatan->id)->get(),
            'apilists' => Apilist::all(),
            'kecamatan' => $kecamatan,
            'apilist' => $apilist,
            'desa' => $desa,
            'title' => 'List Desa'
        ]);
    }
}
