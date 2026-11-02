<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $response = Http::api()->post('/users/login', $request->only('email', 'password'));

        if ($response->failed())
        {
            return back()->with('error', $response->json('message'));
        }

        session(['api_token' => $response->json('token')]);

        return view('dashboard');
    }

    public function logout()
    {
        session()->forget('api_token');

        return redirect()->route('login');
    }
}
