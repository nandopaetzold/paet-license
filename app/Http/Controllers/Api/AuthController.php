<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiAuthRequest;
use Illuminate\Http\Request;
use App\Service\ApiAuthService;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function __construct(
        private ApiAuthService $apiAuthService
    ) {
    }

    public function index()
    {
        return $this->apiAuthService->index();
    }

    public function authenticate(ApiAuthRequest $request)
    {
        $validate = $request->validated();
        $token = $this->apiAuthService->authenticate($validate, $request);
        return $token;
    }

    public function user(Request $request)
    {
        return $this->apiAuthService->user($request);
    }

    public function logout(Request $request)
    {
        return $this->apiAuthService->logout($request);
    }
}
