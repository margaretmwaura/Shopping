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

            return response()->json([
                'status' => 200,
                'message' => 'Login was successful',
            ]);

        }

        return response()->json([
            'status' => 404,
            'message' => 'Login was unsuccessful',
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return response()->json([
            'status' => 200,
            'message' => 'Logging out',
        ]);
    }
}
