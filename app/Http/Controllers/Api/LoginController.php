<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
       return view('login.index', [
           'title' => 'Login',
       ]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(!Auth::attempt($credentials)){
            return back()->with('loginError', 'Login Gagal');
        }
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
            Session::put('token', $token);

        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }
    public function logout(Request $request){
        Auth::logout();
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
            json_decode($response->getBody()->getContents(), true);
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
