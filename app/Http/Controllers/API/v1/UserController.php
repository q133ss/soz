<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserController\EditProfileRequest;

class UserController extends Controller
{
    public function getInfo()
    {
        return Auth()->user();
    }

    public function editProfile(EditProfileRequest $request)
    {
        return Auth()->user()->update($request->validated());
    }
}
