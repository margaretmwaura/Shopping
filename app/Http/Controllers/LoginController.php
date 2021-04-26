<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $requestFields)
    {
        $attributes = $requestFields->only(['email', 'password']);

        if (Auth::attempt($attributes)) {
            return redirect()->route('/');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return back();
    }
}
