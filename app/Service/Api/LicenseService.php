<?php

namespace App\Service\Api;

use App\Models\License;

class LicenseService
{

    public function __construct(
        public License $license
    ) {
    }

    public function create($request)
    {
        try {
            //gerar token em base64 com 32 caracteres aleatórios com time
            $token = base64_encode(random_bytes(32) . time());
            //remove hash  [ + - . / _]
            $token = str_replace(['+', '-', '.', '/', '_', '#', '@'], '', $token);
            $company = auth()->user();

            //verificar se existe uma conta como o mesmo name
            $license = $this->license->where('name', $request->name)->first();


            $license = $this->license->create([
                'name' => $request->name,
                'expires_at' => $request->expires_at,
                'token' => $token,
                'company_id' => $company->id,
                'status' => 1,
                'webhook_url' => $request->webhook_url,
                'ip_address' => $request->ip_address ?? null,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Licença criada com sucesso!',
                'token' => $license
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao criar licença!',
            ], 400);
        }
    }

    public function update($request)
    {
        $license = $this->license->where('token', $request->token)->first();

        if ($license) {
            //token nao pertence a empresa
            if ($license->company_id != auth()->user()->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Licença não pertence ao seu cadastro!',
                ], 400);
            }
            if ($request->name) {
                $license->name = $request->name;
            }
            if ($request->expires_at) {
                $license->expires_at = date('Y-m-d', strtotime($request->expires_at));
            }

            if ($request->webhook_url) {
                $license->webhook_url = $request->webhook_url;
            }

            if ($request->ip_address) {
                $license->ip_address = $request->ip_address;
            }

            $license->save();
            //convert date


            return response()->json([
                'success' => true,
                'message' => 'Licença atualizada com sucesso!',
                'token' => $license
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Licença não encontrada!',
        ], 400);
    }


    public function delete($token)
    {
        $license = $this->license->where('token', $token)->first();
        if ($license) {
            //token nao pertence a empresa
            if ($license->company_id != auth()->user()->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Licença não pertence ao seu cadastro!',
                ], 400);
            }

            $license->delete();
            return response()->json([
                'success' => true,
                'message' => 'Licença removida com sucesso!',
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Licença não encontrada!',
        ], 400);
    }

    public function status($token)
    {
        $license = $this->license->where('token', $token)->first();
        if ($license) {

            if (!is_null($license->ip_address) && $license->ip_address != request()->ip()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Licença não habilitada para esse ip!',
                ], 400);
            }

            //count ++
            $license->request_count = $license->request_count + 1;
            $license->save();

            return response()->json([
                'status' => true,
                'message' => 'Licença encontrada!',
                'license' => [
                    'name' => $license->name,
                    'company' => $license->company->name ?? 'Não informado',
                    'expires' => date('Y-m-d', strtotime($license->expires_at)),
                    'status' => $license->is_active == 1 ? true : false,
                    'webhook_url' => $license->webhook_url ?? 'Não informado',
                    'created' => date('Y-m-d', strtotime($license->created_at)),
                    'request_count' => $license->request_count

                ]
            ], 200);
        }
        return response()->json([
            'status' => false,
            'message' => 'Licença não encontrada!',
        ], 400);
    }
}
