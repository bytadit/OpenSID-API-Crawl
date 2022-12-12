<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Bloodtype;
use App\Models\Pemilih;
use Illuminate\Support\Facades\Http;
// namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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
    public function handle()
    {
        // User::whereNotNull('email_verified_at')
        //     ->whereDate('created_at', now()->subDays(1))
        //     ->get()->each(function ($user) {
        //         $user->notify(new SendDocLinkNotification());
        //     });

        $client = new \GuzzleHttp\Client();
        // $token = Session::get('token');
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjcwODQ0NDE3LCJleHAiOjE2NzA4NDgwMTcsIm5iZiI6MTY3MDg0NDQxNywianRpIjoiM2wwT2prVzhxenExMlBYaSIsInN1YiI6IjMiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.iQn28oxgGg72vCALdGCt5s5Uo4o-4Fch2UJk85H1VOU';
        $url = "http://127.0.0.1:8000/api/pemilih";
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer {$token}"
                ]
            ]);
        // $object = json_decode($response->getBody());
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
        return Command::SUCCESS;
    }
}
