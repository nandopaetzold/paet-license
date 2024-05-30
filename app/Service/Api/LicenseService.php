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
                'expires_at' => $request->expires_at ?? null,
                'token' => $token,
                'company_id' => $company->id,
                'status' => 1,
                'webhook_url' => $request->webhook_url ?? null,
                'ip_address' => $request->ip_address ?? null,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Licença criada com sucesso!',
                'token' => $license
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Erro ao criar licença!',
            ], 400);
        }
    }

    public function update($request)
    {

        try {
            $license = $this->license->where('token', $request->token)->first();
            if (!$license || $license->company_id != auth()->user()->id) {
                throw new \Exception('Licença não pertence ao seu cadastro!');
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

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }

    }


    public function delete($token)
    {
        try {
            $license = $this->license->where('token', $token)->first();
            if (!$license || $license->company_id != auth()->user()->id) {
                throw new \Exception('Licença não pertence ao seu cadastro!');
            }

            $license->delete();
            return response()->json([
                'success' => true,
                'message' => 'Licença removida com sucesso!',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    public function status($token)
    {
        try {
            $license = $this->license->where('token', $token)->first();

            if (!$license || !is_null($license->ip_address) && $license->ip_address != request()->ip()) {
                throw new \Exception('Licença não encontrada!', 404);
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
                    'expires' => $license->expires_at ? date('Y-m-d', strtotime($license->expires_at)) : 'Licença vitalícia',
                    'status' => $this->verificarTempo($license->expires_at, $license->is_active) ? true : false,
                    'webhook_url' => $license->webhook_url ?? 'Não informado',
                    'created' => date('Y-m-d', strtotime($license->created_at)),
                    'request_count' => $license->request_count

                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    private function verificarTempo($tempo, $status)
    {

        if (!is_null($tempo)) {
            if (strtotime($tempo) > strtotime(date('Y-m-d')) && $status == 1) {
                return true;
            }
            return false;
        }

        if ($status == 1) {
            return true;
        }
        return false;


    }
}