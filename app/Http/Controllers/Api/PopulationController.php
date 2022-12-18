<?php

namespace App\Http\Controllers\Api;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Population;
use App\Http\Controllers\Controller;
use App\Charts\ApiChart;

class PopulationController extends Controller
{
    public function index(Kecamatan $kecamatan, Desa $desa)
    {
        $populations = Population::where('desa_id', $desa->id)->get();
        $labels = collect(['Pria', 'Wanita']);
        $data_pria = $populations->flatten(1)->pluck('pria')->sum();
        $data_wanita = $populations->flatten(1)->pluck('wanita')->sum();
        $colors = $labels->map(function($item) {
            return $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
        });
        $chart = new ApiChart;
        $chart->labels($labels);
        $chart->dataset('Populasi', 'pie', [$data_pria, $data_wanita])->backgroundColor($colors);
        return view('dashboard.apilist.population.index', [
            'populations' => $populations,
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'title' => 'Populations API',
            'chart' => $chart
        ]);
    }
}
