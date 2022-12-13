<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
// use App\Models\Config;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register',
            // 'active' => 'register',
            // 'configs' => Config::all()->first(),
        ]);
    }
    public function store(Request $request){

        $validatedData = $request->validate([
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            // 'email' => 'required|email:dns|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Registrasi Berhasil, Silakan Login');
    }
}
