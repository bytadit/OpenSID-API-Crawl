<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BloodTypesController extends Controller
{
    public function index(){

        $client = new \GuzzleHttp\Client();
        $token = Session::get('token');
        $url = "http://127.0.0.1:8000/api/bloodtypes";
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer {$token}"
                ]
            ]);
        $bodies = json_decode($response->getBody());
        return view('apis.bloodtypes', [
            'title' => 'Bloodtypes',
        ],
        compact('bodies'));
        // print_r(json_decode((string) $body));

        // return view('register.index', [
        //     'title' => 'Register',
        // ]);
    }


}
