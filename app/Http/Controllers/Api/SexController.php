<?php

namespace App\Http\Controllers\Api;

use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Apilist;
// use App\Models\Kecamatan;
use App\Models\Bloodtype;
use App\Models\Pemilih;
use App\Models\Population;
use App\Models\Sex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use DB;

class SexController extends Controller
{
    public function index(Request $request, Kecamatan $kecamatan, Desa $desa)
    {
        $kecamatan=$desa->kecamatan_id;
        // $total_data=$desas->count();
        return view('dashboard.apilist.sex.index', [
            // 'desas' => Desa::where('kecamatan_id', $id)->get(),
            // 'kecamatan' => $desa->kecamatan_id,
            // 'desas' => Desa::where('kecamatan_id', $id)->get(),
            // 'apilists' => Apilist::all(),
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'sexes' => Sex::where('desa_id', $desa->id)->get(),
            // 'pemilihs' => Pemilih::where('desa_id', $desa->id)->get(),
            // 'sexes' => Sex::where('desa_id', $desa->id)->get(),
            // 'populations' => Population::where('desa_id', $desa->id)->get(),
            'title' => 'Sex API'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
