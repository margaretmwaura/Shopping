<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Traits\RegisterUser;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    use RegisterUser;

    public function register(RegistrationRequest $requestFields)
    {
        $this->registerUser($requestFields);

        return response()->json([
            'status' => 200,
            'message' => 'Signup was successful'
        ]);
    }
}
