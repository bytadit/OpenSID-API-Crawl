<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
            return view('dashboard.index', [
                'kecamatans' => Kecamatan::all(),
                'desas' => Desa::all(),
                'title' => 'Dashboard'
            ]);
    }
}
