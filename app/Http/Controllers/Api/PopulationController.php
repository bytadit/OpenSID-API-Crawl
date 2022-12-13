<?php

namespace App\Http\Controllers\Api;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Population;
use App\Http\Controllers\Controller;

class PopulationController extends Controller
{
    public function index(Kecamatan $kecamatan, Desa $desa)
    {
        return view('dashboard.apilist.population.index', [
            'populations' => Population::where('desa_id', $desa->id)->get(),
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'title' => 'Populations API'
        ]);
    }
}
