<?php

namespace App\Service\Api;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;

class CompanyService
{

    public function __construct(
        public Company $company
    ) {
    }

    public function create(CompanyRequest $request)
    {
        try {
            $company = $this->company->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => 1,
            
            ]);
            $company->token = $company->createToken('token')->plainTextToken;
            $company->save();
            //unshif $company->password
            unset($company->password);
            return response()->json([
                'status' => true,
                'message' => 'Empresa criada com sucesso!',
                'token' => $company
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Erro ao criar empresa!',
            ], 400);
        }
    }

    public function update($request)
    {

    }


    public function delete($token)
    {

    }

    public function authenticate($token)
    {


        //sanctun auth token
        try {

            //verificar se existe uma conta como o mesmo name
            $company = $this->company->where('token', $token)->first();
            if (!$company) {
                //diminuir tentativas
                throw new \Exception('Empresa não encontrada!', 404);
            }

            //se existir, verificar se o token é valido
            if (!$company->tokenCan('token')) {
                throw new \Exception('Token inválido!', 401);
            }

            return response()->json([
                'status' => true,
                'message' => 'Empresa autenticada com sucesso!',
                'token' => $company
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], $e->getCode() == 0 ? 400 : $e->getCode());
        }
    }

}