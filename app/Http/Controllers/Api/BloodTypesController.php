<?php

namespace App\Http\Controllers\Api;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Bloodtype;
use App\Http\Controllers\Controller;

class BloodtypesController extends Controller
{
    public function index(Kecamatan $kecamatan, Desa $desa)
    {
        return view('dashboard.apilist.bloodtype.index', [
            'bloodtypes' => Bloodtype::where('desa_id', $desa->id)->get(),
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'title' => 'Bloodtypes API'
        ]);
    }
}
