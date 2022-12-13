<?php

namespace Database\Seeders;
use App\Models\Apilist;
use App\Models\Kecamatan;
use App\Models\Desa;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Apilist Seeder
        $apis = ['pemilih', 'bloodtypes', 'sex', 'populations'];
        for ($i = 0; $i < sizeof($apis); $i++){
            Apilist::create([
                'path_api' => $apis[$i]
            ]);
        }
        // Kecamatan Seeder
        $kecamatans = ['Laweyan', 'Banjarsari', 'Gumpang', 'Gentan'];
        for ($i = 0; $i < sizeof($kecamatans); $i++){
            Kecamatan::create([
                'nama' => $kecamatans[$i],
                'url_kecamatan' => strtolower($kecamatans[$i])
            ]);
        }
        // Desa Seeder
        // $desas = ['KERANDANGAN', 'LOCO', 'MANGSIT', 'SENGGIGI'];
        // for ($i = 0; $i < sizeof($desas); $i++){
        //     Desa::create([
        //         'nama' => $desas[$i],
        //         'kecamatan_id' => rand(1,3),
        //         'url_desa' => strtolower($desas[$i])
        //     ]);
        // }

    }
}
