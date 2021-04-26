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
        $user = $this->registerUser($requestFields);

        return redirect('/');
    }
}
