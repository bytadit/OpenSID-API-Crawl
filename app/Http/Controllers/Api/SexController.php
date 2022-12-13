<?php

namespace App\Http\Controllers\Api;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Sex;
use App\Http\Controllers\Controller;

class SexController extends Controller
{
    public function index(Kecamatan $kecamatan, Desa $desa)
    {
        return view('dashboard.apilist.sex.index', [
            'sexes' => Sex::where('desa_id', $desa->id)->get(),
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'title' => 'Sex API'
        ]);
    }
}
