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
        $apis_name = ['Calon Pemilih', 'Golongan Darah', 'Jenis Kelamin', 'Populasi'];
        $apis = ['pemilih', 'bloodtypes', 'sex', 'populations'];
        for ($i = 0; $i < sizeof($apis); $i++){
            Apilist::create([
                'nama' => $apis_name[$i],
                'path_api' => $apis[$i]
            ]);
        }
        // Kecamatan Seeder
        $kecamatans = ['Laweyan', 'Banjarsari'];
        for ($i = 0; $i < sizeof($kecamatans); $i++){
            Kecamatan::create([
                'nama' => $kecamatans[$i],
                'url_kecamatan' => strtolower($kecamatans[$i])
            ]);
        }

         // Desa Seeder
         $desas = ['Desa1', 'Desa2', 'Desa3', 'Desa4',
                   'Desa5', 'Desa6', 'Desa7', 'Desa8',
                   'Desa9', 'Desa10', 'Desa11', 'Desa12'
                  ];
        $init = 0;
         for ($i = 1; $i <= sizeof($kecamatans); $i++){
            for($j=$init; $j < $i*6; $j++){
                Desa::create([
                    'nama' => $desas[$j],
                    'kecamatan_id' => $i,
                    'url_desa' => strtolower($desas[$j])
                ]);
            }
            $init += 6;
         }
    }
}
