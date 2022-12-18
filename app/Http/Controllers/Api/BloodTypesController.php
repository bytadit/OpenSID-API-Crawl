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
        $labels = collect(['A', 'AB', 'B', 'O']);
        $data_A = $bloodtypes->where('bloodtype_name', '=', 'A')->flatten(1)->pluck('Total')->sum();
        $data_AB = $bloodtypes->where('bloodtype_name', '=', 'AB')->flatten(1)->pluck('Total')->sum();
        $data_B = $bloodtypes->where('bloodtype_name', '=', 'B')->flatten(1)->pluck('Total')->sum();
        $data_O = $bloodtypes->where('bloodtype_name', '=', 'O')->flatten(1)->pluck('Total')->sum();
        $colors = $labels->map(function ($item) {
            return $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
        });
        $chart = new ApiChart;
        $chart->labels($labels);
        $chart->dataset('Bloodtype', 'pie', [$data_A, $data_AB, $data_B, $data_O])->backgroundColor($colors);
        return view('dashboard.apilist.bloodtype.index', [
            'bloodtypes' => Bloodtype::where('desa_id', $desa->id)->get(),
            'kecamatan' => $kecamatan,
            'desa' => $desa,
            'title' => 'Bloodtypes API',
            'chart' => $chart
        ]);
    }
}
