<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use PhpParser\Node\Expr\Exit_;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Pagination\LengthAwarePaginator;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       return view('login.index', [
           'title' => 'Login',
       ]);
    }

    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     if(Auth::attempt($credentials)){
    //         $request->session()->regenerate();
    //         $client = new Client();
    //         $url = "http://127.0.0.1:8000/api/login";
    //         $response = $client->post($url, [
    //             'form_params' => [
    //                 'email' => $request->get('email'),
    //                 'password' => $request->get('password')
    //             ],
    //         ]);
    //         $object = json_decode($response->getBody()->getContents(), true);
    //         $token = $object['token'];
    //         Session::put('token', $token);
    //         // return redirect('/home');
    //         return redirect()->intended('/home');
    //     }

    //     return back()->with('loginError', 'Login Failed');
    // }

    // public function logout(Request $request){
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     // return redirect('/login');
    //     $client = new Client();
    //     $token = Session::get('token');
    //     $url = "http://127.0.0.1:8000/api/logout";
    //     $response = $client->post($url, [
    //         'headers' => [
    //             'Accept' => 'application/json',
    //             'Content-Type' => 'application/json',
    //             'Authorization' => "Bearer {$token}"
    //             ]
    //         ]);
    //     // $object = json_decode($response->getBody()->getContents(), true);
    //     // print_r($object);
    //     json_decode($response->getBody()->getContents(), true);
    //     return redirect('/login');
    // }

    public function store(Request $request)
    {
        try {
            $client = new Client();
            $url = "http://127.0.0.1:8000/api/login";
            $response = $client->post($url, [
                'form_params' => [
                    'email' => $request->get('email'),
                    'password' => $request->get('password')
                ],
            ]);
            $object = json_decode($response->getBody()->getContents(), true);
            $token = $object['token'];
            // return $token;
            Session::put('token', $token);
            // return view('home.index', [
            //     'title' => 'Home',
            // ])->redirect('/login');
            // $title = 'Home';
            // return redirect()->route('home', [$title = 'Home']);
            return redirect('/home');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function logout(Request $request){
        try {
            $client = new Client();
            $token = Session::get('token');
            $url = "http://127.0.0.1:8000/api/logout";
                $response = $client->post($url, [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                        'Authorization' => "Bearer {$token}"
                    ]
                ]);
            $object = json_decode($response->getBody()->getContents(), true);
            print_r($object);
            return redirect('/login');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
