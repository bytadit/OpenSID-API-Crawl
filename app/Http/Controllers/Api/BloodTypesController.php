<?php

namespace App\Http\Controllers\Api;

use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Bloodtype;
use App\Http\Controllers\Controller;
use App\Charts\ApiChart;

class BloodtypesController extends Controller
{
    public function index(Kecamatan $kecamatan, Desa $desa)
    {
        $bloodtypes = Bloodtype::where('desa_id', $desa->id)->get();
        $labels = collect(['Pria', 'Wanita']);
        $data_pria = $bloodtypes->flatten(1)->pluck('Pria');
        $data_wanita = $bloodtypes->flatten(1)->pluck('Wanita');
        $colors = $labels->map(function ($item) {
            return $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
        });
        $chart = new ApiChart;
        $chart->labels($labels);
        $chart->dataset('Bloodtype', 'pie', [$data_pria, $data_wanita])->backgroundColor($colors);
        return view('dashboard.apilist.bloodtype.index', [
            'bloodtypes' => Bloodtype::where('desa_id', $desa->id)->get(),
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'title' => 'Bloodtypes API',
            'chart' => $chart
        ]);
    }
}
