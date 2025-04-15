<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nip' => ['required', 'string', 'max:9', 'unique:user'],
            'nama' => ['required', 'string', 'max:150'],
            'alamat' => ['required', 'string', 'string', 'max:300'],
            'no_hp' => ['required', 'string', 'max:16'],
            'program_studi' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:9', 'confirmed']
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('welcome');
    }

    public function login()
    {
        
    }
}