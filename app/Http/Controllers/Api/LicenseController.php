<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\Api\LicenseService;
use App\Http\Requests\LicenseRequest;
use App\Http\Requests\LicenseRequestStatus;

class LicenseController extends Controller
{
    public function __construct(
        public LicenseService $licenseService
    ) {
    }

    public function create(LicenseRequest $request)
    {
        $request->validated();
        return $this->licenseService->create($request);
    }

    public function update(LicenseRequest $request)
    {
        $request->validated();
        return $this->licenseService->update($request);
    }

    public function delete(LicenseRequestStatus $request)
    {
        $request->validated();
        return $this->licenseService->delete($request->get('token'));
    }

    public function status(LicenseRequestStatus $request)
    {
        return $this->licenseService->status($request->get('token'));
    }

    public function status_get($token)
    {
        return $this->licenseService->status($token);
    }
}
