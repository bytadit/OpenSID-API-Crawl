<?php

namespace App\Http\Controllers\Api;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Pemilih;
use App\Http\Controllers\Controller;

class PemilihController extends Controller
{
    public function index(Kecamatan $kecamatan, Desa $desa)
    {
        return view('dashboard.apilist.pemilih.index', [
            'pemilihs' => Pemilih::where('desa_id', $desa->id)->get(),
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'title' => 'Pemilih API'
        ]);
    }
}
