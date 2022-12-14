<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Bloodtype;
use App\Models\Sex;
use App\Models\Desa;
use App\Models\Population;
use App\Models\Pemilih;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HarvestApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'harvest:apis {token}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Harvesting Apis';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client();
        $token = $this->argument('token');

        $progressBar = $this->output->createProgressBar();
        $progressBar->start();

        // Pemilih
            $this->info('Harvesting API Pemilih');
            $url = "http://127.0.0.1:8000/api/pemilih";
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer {$token}"
                ]
            ]);
            $object = json_decode($response->getBody()->getContents(), true);
            $data = $object['data'];
            foreach($data as $datum)
            {
                $datum = (array) $datum;
                Pemilih::updateOrCreate(
                    [
                        'desa_id' => $datum['DusunID'],
                        'dusun_name' => $datum['DusunName'],
                        'rt' => $datum['RT'],
                        'rw' => $datum['RW'],
                        'Lk' => $datum['Lk'],
                        'Pr' => $datum['Pr'],
                        'Jiwa' => $datum['Jiwa']
                    ]
                );
            };
            sleep(1);
            $progressBar->advance();

        // BloodTypes
            $this->info('Harvesting API Bloodtype');
            $url = "http://127.0.0.1:8000/api/bloodtypes";
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer {$token}"
                ]
            ]);
            $object = json_decode($response->getBody()->getContents(), true);
            $data = $object['data'];
            foreach($data as $datum)
            {
                $datum = (array) $datum;
                Bloodtype::updateOrCreate(
                    [
                        'desa_id' => $datum['DusunID'],
                        'bloodtype_name' => $datum['BloodTypeName'],
                        'Pria' => $datum['Pria'],
                        'Wanita' => $datum['Wanita'],
                        'Total' => $datum['Total'],
                    ]
                );
            };
            sleep(1);
            $progressBar->advance();

        // Population
            $this->info('Harvesting API Population');
            $url = "http://127.0.0.1:8000/api/populations";
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer {$token}"
                ]
            ]);
            $object = json_decode($response->getBody()->getContents(), true);
            $data = $object['data'];
            foreach($data as $datum)
            {
                $datum = (array) $datum;
                Population::updateOrCreate(
                    [
                        'desa_id' => $datum['DusunID'],
                        'rt' => $datum['RT'],
                        'rw' => $datum['RW'],
                        'jumlah_kk' => $datum['Jumlah_KK'],
                        'pria' => $datum['Pria'],
                        'wanita' => $datum['Wanita'],
                        'total_pw' => $datum['Total_PW'],
                        'dusun_name' => $datum['DusunName'],
                    ]
                );
            };
            sleep(1);
            $progressBar->advance();

        // Sex
            $this->info('Harvesting API Sex');
            $url = "http://127.0.0.1:8000/api/sex";
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer {$token}"
                ]
            ]);
            $object = json_decode($response->getBody()->getContents(), true);
            $data = $object['data'];
            foreach($data as $datum)
            {
                $datum = (array) $datum;
                Sex::updateOrCreate(
                    [
                        'desa_id' => $datum['DusunID'],
                        'jenis_kelamin_id' => $datum['id_jenis_kelamin'],
                        'jenis_kelamin' => $datum['jenis_kelamin'],
                        'total' => $datum['total']
                    ]
                );
            };
            sleep(1);
            $progressBar->advance();

        // Desa
            $this->info('Harvesting API Desa');
            $url = "http://127.0.0.1:8000/api/dusuns";
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer {$token}"
                ]
            ]);
            $object = json_decode($response->getBody()->getContents(), true);
            $data = $object['data'];
            foreach($data as $datum)
            {
                $datum = (array) $datum;
                Desa::updateOrCreate(
                    [
                        'id' => $datum['id'],
                        'nama' => $datum['name'],
                        'kecamatan_id' => $datum['kecamatan_id'],
                        'url_desa' => str_replace([' ', '.'], '-', strtolower($datum['name']))

                    ]
                );
            };
            sleep(1);
            $progressBar->advance();
        $progressBar->finish();
        $this->info('Harvesting Completed !!');
    }
}
