<?php

namespace App\Http\Controllers\Api;

use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Sex;
use App\Http\Controllers\Controller;
use App\Charts\ApiChart;

class SexController extends Controller
{
    public function index(Kecamatan $kecamatan, Desa $desa)
    {
        $sexes = Sex::where('desa_id', $desa->id)->get();
        $labels = collect(['Pria', 'Wanita']);
        $data_Pria = $sexes->where('jenis_kelamin', '=', 'Pria')->flatten(1)->pluck('total')->sum();
        $data_Wanita = $sexes->where('jenis_kelamin', '=', 'Wanita')->flatten(1)->pluck('total')->sum();
        $colors = $labels->map(function ($item) {
            return $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
        });
        $chart = new ApiChart;
        $chart->labels($labels);
        $chart->dataset('Sex', 'pie', [$data_Pria, $data_Wanita])->backgroundColor($colors);
        return view('dashboard.apilist.sex.index', [
            'sexes' => Sex::where('desa_id', $desa->id)->get(),
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'title' => 'Sex API',
            'chart' => $chart
        ]);
    }
}
