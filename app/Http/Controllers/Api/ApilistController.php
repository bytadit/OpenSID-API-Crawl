<?php

namespace App\Http\Controllers\Api;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Apilist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApilistController extends Controller
{
    public function index(Apilist $apilist, Kecamatan $kecamatan, Desa $desa)
    {
        return view('dashboard.apilist.index', [
            'desas' => Desa::where('kecamatan_id', $kecamatan->id)->get(),
            'apilists' => Apilist::all(),
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'apilist' => $apilist,
            'title' => 'List API'
        ]);
    }
}
