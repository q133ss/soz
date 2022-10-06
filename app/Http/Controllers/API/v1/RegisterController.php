<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterController\RegisterRequest;
use App\Services\AuthService;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        return AuthService::register($request);
    }
}
