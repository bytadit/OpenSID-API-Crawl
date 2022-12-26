<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Bloodtype;
use App\Models\Sex;
use App\Models\Apilist;
use App\Models\Desa;
use App\Models\Population;
use App\Models\Pemilih;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;


class HarvestApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'harvest:apis';

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
    public function handle(Request $request)
    {
        $desas = Desa::all();
        $apilists = Apilist::all();

        $defaultIndex = 'Belum';
        $akun = $this->choice(
            'Apakah sudah punya akun?',
            ['Sudah', 'Belum'],
            $defaultIndex
        );

        if ($akun == $defaultIndex) {
            $this->info('Form Registrasi');
            $name = $this->ask('Nama');
            $email = $this->ask('Email');
            $password = $this->secret('Password');
            $password_confirm = $this->secret('Konfirmasi Password');
            while ($password_confirm != $password) {
                $this->error('Konfirmasi Password tidak cocok!');
                $password_confirm = $this->secret('Konfirmasi Password');
            }
            $this->info('Registrasi Berhasil!');
            foreach ($desas as $desa) {
                $client = new \GuzzleHttp\Client();
                $this->info('Mendaftarkan akun di server Desa '. $desa->nama);
                $url_register = $desa->url_desa . "api/register";
                $client->post($url_register, [
                    'form_params' => [
                        'name' => $name,
                        'email' => $email,
                        'password' => $password,
                        'password_confirmation' => $password_confirm,
                    ]
                ]);
                $this->info('Pendaftaran akun di server Desa '.$desa->nama.' berhasil!');
            }
        } else {
            $this->info('Form Login');
            $email = $this->ask('Email');
            $password = $this->secret('Password');
        }

        $progressBar = $this->output->createProgressBar();
        $progressBar->start();
        $this->info('Memulai Harvesting Data Periode ' . Carbon::now()->format('Y-m-d H:i:s'));

        foreach ($desas as $desa) {
            // Login
            $client = new \GuzzleHttp\Client();
            $url_login = $desa->url_desa . "api/login";
            $response = $client->post($url_login, [
                'form_params' => [
                    'email' => $email,
                    'password' => $password
                ],
            ]);
            $object = json_decode($response->getBody()->getContents(), true);
            $token = $object['token'];

            $this->info('Harvesting Data Desa ' . $desa->nama);
            // Apis Harvesting
            foreach ($apilists as $apilist) {
                $this->info('Harvesting API ' . $apilist->nama);
                $url = $desa->url_desa . "api/" . $apilist->path_api;

                $response = $client->get($url, [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                        'Authorization' => "Bearer {$token}"
                    ]
                ]);
                $object = json_decode($response->getBody()->getContents(), true);
                $data = $object['data'];

                foreach ($data as $datum) {
                    $datum = (array) $datum;
                    if ($apilist->path_api == 'pemilih') {
                        Pemilih::updateOrCreate(
                            [
                                'desa_id' => $datum['DesaID'],
                                'dusun_id' => $datum['DusunID'],
                                'dusun_name' => $datum['nama_dusun'],
                                'rt' => $datum['RT'],
                                'rw' => $datum['RW'],
                                'Lk' => $datum['Lk'],
                                'Pr' => $datum['Pr'],
                                'Jiwa' => $datum['Jiwa'],
                                'harvested_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            ]
                        );
                    } elseif ($apilist->path_api == 'bloodtypes') {
                        Bloodtype::updateOrCreate(
                            [
                                'desa_id' => $datum['DesaID'],
                                'dusun_id' => $datum['DusunID'],
                                'dusun_name' => $datum['nama_dusun'],
                                'bloodtype_name' => $datum['BloodTypeName'],
                                'Pria' => $datum['Pria'],
                                'Wanita' => $datum['Wanita'],
                                'Total' => $datum['Total'],
                                'harvested_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            ]
                        );
                    } elseif ($apilist->path_api == 'sex') {
                        Sex::updateOrCreate(
                            [
                                'desa_id' => $datum['DesaID'],
                                'dusun_id' => $datum['DusunID'],
                                'dusun_name' => $datum['nama_dusun'],
                                'jenis_kelamin_id' => $datum['id_jenis_kelamin'],
                                'jenis_kelamin' => $datum['jenis_kelamin'],
                                'total' => $datum['total'],
                                'harvested_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            ]
                        );
                    } elseif ($apilist->path_api == 'populations') {
                        Population::updateOrCreate(
                            [
                                'desa_id' => $datum['DesaID'],
                                'dusun_id' => $datum['DusunID'],
                                'dusun_name' => $datum['nama_dusun'],
                                'rt' => $datum['RT'],
                                'rw' => $datum['RW'],
                                'jumlah_kk' => $datum['Jumlah_KK'],
                                'pria' => $datum['Pria'],
                                'wanita' => $datum['Wanita'],
                                'total_pw' => $datum['Total_PW'],
                                'harvested_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            ]
                        );
                    };
                };
            };
            // logout
            $url_logout = $desa->url_desa . "api/logout";
            $response = $client->post($url_logout, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer {$token}"
                    ]
                ]);
                $object = json_decode($response->getBody()->getContents(), true);
                $this->info('Harvesting Data Desa ' . $desa->nama . ' Completed !!');
            sleep(1);
            $progressBar->advance();
        };
        $progressBar->finish();
        $this->info('All Data Harvested!!');
    }
}
