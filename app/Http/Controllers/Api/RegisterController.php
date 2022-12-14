<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
// use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register',
        ]);
    }

    public function store(Request $request){
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/register";
            $client->post($url, [
                'form_params' => [
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'password' => $request->get('password'),
                    'password_confirmation' => $request->get('password_confirmation'),
                ]
            ]);
        $validatedData = $request->validate([
            // 'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            // 'firstName' => 'required|max:255',
            // 'lastName' => 'required|max:255',
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration Successfull!! Please Login');
    }
}
