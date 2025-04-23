<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // arahkan ke view login
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('/dashboard'); // sesuaikan dengan tujuan
    //     }

    //     return back()->withErrors([
    //         'email' => 'Email atau password salah.',
    //     ])->onlyInput('email');
    // }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'admin' && $password === '123') {
            session(['logged_in' => true]);
            return redirect('/admin/profile');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return redirect('/login'); // arahkan ke halaman login setelah logout
    // }

    public function logoutForm()
    {
        return view('auth.logout'); // arahkan ke view logout
    }

    public function logout(Request $request)
    {
        $request->session()->forget('logged_in');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
