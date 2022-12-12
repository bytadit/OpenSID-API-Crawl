<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PemilihController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $client = new \GuzzleHttp\Client();
        $token = Session::get('token');
        $url = "http://127.0.0.1:8000/api/pemilih";
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                    'Authorization' => "Bearer {$token}"
                ]
            ]);
        $bodies = json_decode($response->getBody());
        return view('apis.pemilih', [
            'title' => 'Pemilih',
        ],
        compact('bodies'));
        // print_r(json_decode((string) $body));

        // return view('register.index', [
        //     'title' => 'Register',
        // ]);
    }
}
