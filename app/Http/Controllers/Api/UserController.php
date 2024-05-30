<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function __construct(
        private User $user
    ) {

    }

    public function create(UserRequest $request)
    {
        $request->validated();

    }

}