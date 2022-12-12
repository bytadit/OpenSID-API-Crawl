<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use PhpParser\Node\Expr\Exit_;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register',
        ]);
    }

    public function store(Request $request){

        $client = new \GuzzleHttp\Client();
        $url = "http://127.0.0.1:8000/api/register";
            $response = $client->post($url, [
                'form_params' => [
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'password' => $request->get('password'),
                    'password_confirmation' => $request->get('password_confirmation'),
                ]
            ]);
        // $body = $response->getBody();
        // print_r(json_decode((string) $body));
        return redirect('/login')->with('success', 'Registration Successfull!! Please Login');

    }
}



