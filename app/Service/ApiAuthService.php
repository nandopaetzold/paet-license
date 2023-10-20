<?php

namespace App\Service;

use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class ApiAuthService
{
    public function __construct(
        public CompanyService $companyService,
    ) {
    }
    public function index()
    {
        return response()->json([
            'message' => 'Não autorizado!'
        ], 401);
    }

    public function authenticate($validate, $request)
    {
        $validate = $request->validated();
        $credentials = $request->only(
            'email',
            'password'
        );

        if (!isset($credentials['email']) || empty($credentials['email'])) {
            return response()->json([
                'message' => 'Email is required'
            ], 401);
        }
        return $this->createTokenByCredentials($credentials);
    }

    public function createTokenByCredentials($credentials)
    {
        try {
            
            $company = $this->companyService->findByEmail($credentials['email']);
            
            if (!$company || !Hash::check($credentials['password'], $company->password)) {
                throw new \Exception('As credenciais estão incorretas');
            }
            //delet olds tokens
            $company->tokens()->delete();


            $token = $company->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 401);
        }
    }

    public function user($request)
    {
        return response()->json([
            'user' => $request->user()
        ]);
    }

    public function logout($request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout realizado com sucesso!'
        ]);
    }
}