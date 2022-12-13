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

class DesaController extends Controller
{
    public function index(Request $request, Desa $desa, $id)
    {
        $kecamatan=$desa->kecamatan_id;
        // $total_data=$desas->count();
        return view('dashboard.desa.index', [
            'desas' => Desa::where('kecamatan_id', $id)->get(),
            // 'kecamatan' => $desa->kecamatan_id,
            // 'desas' => Desa::where('kecamatan_id', $id)->get(),
            'apilists' => Apilist::all(),
            'desa' => $desa,
            'bloodtypes' => Bloodtype::where('desa_id', $desa->id)->get(),
            'pemilihs' => Pemilih::where('desa_id', $desa->id)->get(),
            'sexes' => Sex::where('desa_id', $desa->id)->get(),
            'populations' => Population::where('desa_id', $desa->id)->get(),
            'title' => 'Desa'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Kecamatan $kecamatan)
    {
        // return view('dashboard.admin.btslist.create', [

        //     'btslists' => Btslist::all(),
        //     'request' => $request,
        //     'btstypes' => Btstype::all(),
        //     'kecamatans' => Kecamatan::all(),
        //     'configs' => Config::all()->first(),
        //     'kecamatan' => $kecamatan,
        //     // 'villages' => Village::all(),
        //     'providers' => Provider::all(),
        //     'value' => $request->kecamatan_id
        // ]);

    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'nama' => 'required|max:255',
        //     'btstype_id' => 'required',
        //     'provider_id' => 'required',
        //     'lokasi' => 'required',
        //     'village_id' => 'required',
        //     'kecamatan_id' => 'required',
        //     'genset' => 'required',
        //     'tembokBatas' => 'required',
        //     'panjangTanah' => 'required',
        //     'lebarTanah' => 'required',
        //     'tinggiTower' => 'required',
        //     'latitude' => 'required',
        //     'longitude' => 'required',
        //     'images' => 'required|max:2048'
        // ]);

        // $btslist = new Btslist;
        // $btslist->nama = $request->nama;
        // $btslist->btstype_id = $request->btstype_id;
        // $btslist->lokasi = $request->lokasi;
        // $btslist->village_id = $request->village_id;
        // $btslist->genset = $request->genset;
        // $btslist->tembokBatas = $request->tembokBatas;
        // $btslist->panjangTanah = $request->panjangTanah;
        // $btslist->lebarTanah = $request->lebarTanah;
        // $btslist->tinggiTower = $request->tinggiTower;
        // $btslist->latitude = $request->latitude;
        // $btslist->longitude = $request->longitude;
        // $btslist->user_id = auth()->user()->id;;
        // $btslist->save();

        // $provider = Provider::find($request->provider_id);
        // $btslist->providers()->attach($provider);

        // foreach ($request->file('images') as $imagefile) {
        //     $image = new Btsphoto;
        //     $path = $imagefile->store('btsphotos');
        //     $image->url = $path;
        //     $image->btslist_id = $btslist->id;
        //     $image->save();
        // }

        // return redirect('/dashboard/btslists')->with('success', 'Data BTS Baru Berhasil Ditambahkan');
    }
    public function show(Desa $desa, $id)
    {
        return view('dashboard.desa.show', [
            'apilists' => Apilist::all(),
            'bloodtypes' => Bloodtype::where('desa_id', $id)->get(),
            'pemilihs' => Pemilih::where('desa_id', $id)->get(),
            'sexes' => Sex::where('desa_id', $id)->get(),
            // 'kecamatan' => $desa->kecamatan_id,
            'desas' => Desa::where('kecamatan_id', $id)->get(),
            // 'apilists' => Apilist::all(),
            'desa' => $desa,
            'populations' => Population::where('desa_id', $id)->get(),
            'title' => 'Apis'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Btslist  $btslist
     * @return \Illuminate\Http\Response
     */
    public function edit(Btslist $btslist, Btsphoto $btsphoto)
    {
        // return view('dashboard.admin.btslist.edit', [
        //     'btslist' => $btslist,
        //     'btsphoto' => $btsphoto,
        //     'btslists' => Btslist::all(),
        //     'btstypes' => Btstype::all(),
        //     'configs' => Config::all()->first(),
        //     'kecamatans' => Kecamatan::all(),
        //     'villages' => Village::all(),
        //     'providers' => Provider::all(),
        //     'btsimgs' => Btsphoto::where('btslist_id', $btslist->id)->get()
        // ]);
    }

    public function update(Request $request, $id)
    {

        // $btslist = Btslist::findOrFail($id);

        // $this->validate($request, [
        //     'nama' => 'required|max:255',
        //     'btstype_id' => 'required',
        //     'provider_id' => 'required',
        //     'lokasi' => 'required',
        //     'village_id' => 'required',
        //     'kecamatan_id' => 'required',
        //     'genset' => 'required',
        //     'tembokBatas' => 'required',
        //     'panjangTanah' => 'required',
        //     'lebarTanah' => 'required',
        //     'tinggiTower' => 'required',
        //     'latitude' => 'required',
        //     'longitude' => 'required',
        //     'images' => 'max:2048|required'
        // ]);

        // $input = $request->except(['kecamatan_id', 'images', 'provider_id']);
        // $btslist->fill($input)->save();
        // $provider = Provider::find($request->provider_id);
        // $btslist->providers()->sync($provider);

        // if($request->file('images')){
        //     Btsphoto::where('btslist_id', $id)->delete();
        // }
        // // Klo update harus milih gambar lagi
        // foreach ($request->file('images') as $imagefile) {
        //     $image = new Btsphoto;
        //     $path = $imagefile->store('btsphotos');
        //     $image->url = $path;
        //     $image->btslist_id = $id;
        //     $image->save();
        // }


        // return redirect('/dashboard/btslists')->with('success', 'Data BTS Berhasil Diupdate');
    }

    public function destroy(Btslist $btslist, Request $request)
    {

        // Monitoring::where('btslist_id', $btslist->id)->delete();
        // Mysurvey::where('btslist_id', $btslist->id)->delete();
        // Btslist::destroy($btslist->id);
        // $provider = Provider::find($request->provider_id);
        // $btslist->providers()->detach($provider);

        // $survey = Survey::find($request->survey_id);
        // $btslist->surveys()->detach($survey);

        // return redirect('/dashboard/btslists')->with('success', 'Data BTS telah dihapus');
    }


    public function getVillages(Request $request, $kecamatan_id)
    {
        $villages = Village::where('kecamatan_id', '=', $kecamatan_id)->get();
        return response()->json($villages);
    }

}
