<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Bloodtype;
use App\Models\Pemilih;
use App\Models\User;
use App\Models\Population;
use App\Models\Sex;
use App\Models\Apilist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Redirect,Response;

use App\Models\Config;
Use DB;
use Carbon\Carbon;
use Faker\ORM\CakePHP\Populator;

class DashboardController extends Controller
{
    public function index(Request $request){
            return view('dashboard.index', [
                'bloodtypes' => Bloodtype::all(),
                'kecamatans' => Kecamatan::all(),
                'desas' => Desa::all(),
                'pemilihs' => Pemilih::all(),
                'sexes' => Sex::all(),
                'populations' => Population::all(),
                'apilists' => Apilist::all(),
                'title' => 'Dashboard'
                // 'survey_undone' => Mysurvey::where('user_id', auth()->user()->id)->where('status', false),
                // 'survey_done' => Mysurvey::where('user_id', auth()->user()->id)->where('status', true),
                // 'configs' => Config::all()->first(),
                // 'monitorings' => Monitoring::where('user_id', auth()->user()->id)
            ]);


        // $answers = DB::table('answers')
        // ->selectRaw('count(*) as answer_count, offeredanswer_id')
        // ->groupBy('offeredanswer_id')
        // ->get();
        // $label= array();
        // $count = array();
        // foreach($answers as $i){
        //     array_push($label, $i->offeredanswer_id);
        //     array_push($count, $i->answer_count);

        // }


        // return view('dashboard.admin.index', [
        //     'admin' => Admin::all(),
        //     'config' => $config,
        //     'surveys' => Survey::all(),
        //     'btslists' => Btslist::all(),
        //     'surveyors' => User::where('is_admin', false),
        //     'configs' => Config::all()->first(),
        //     'label' => $label,
        //     'count' => $count
        // ]);

    }
}
