<?php

namespace App\Http\Controllers\Api;

use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Pemilih;
use App\Http\Controllers\Controller;
use App\Charts\ApiChart;

class PemilihController extends Controller
{
    public function index(Kecamatan $kecamatan, Desa $desa)
    {
        $pemilihs = Pemilih::where('desa_id', $desa->id)->get();
        $labels = collect(['Pria', 'Wanita']);
        $data_pria = $pemilihs->flatten(1)->pluck('Lk');
        $data_wanita = $pemilihs->flatten(1)->pluck('Pr');
        $colors = $labels->map(function ($item) {
            return $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
        });
        $chart = new ApiChart;
        $chart->labels($labels);
        $chart->dataset('Pemilih', 'pie', [$data_pria, $data_wanita])->backgroundColor($colors);
        return view('dashboard.apilist.pemilih.index', [
            'pemilihs' => Pemilih::where('desa_id', $desa->id)->get(),
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'title' => 'Pemilih API',
            'chart' => $chart
        ]);
    }
}
