<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Bloodtype;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        if (Bloodtype::exists()) {
            $display = 'disabled';
        } else {
            $display = '';
        }
        return view('dashboard.index', [
            'kecamatans' => Kecamatan::all(),
            'desas' => Desa::all(),
            'title' => 'Dashboard',
            'display' => $display,
        ]);
    }
}
