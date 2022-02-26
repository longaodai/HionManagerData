<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (!Auth::check()) return view('pages.auth.login');

        return redirect()->route('admin.list');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            return redirect()->route('admin.list');
        }

        return redirect()->back()->with('msg', 'Đăng nhập thất bại');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
