<?php

namespace App\Http\Controllers\Web;

use App\Service\CompanyService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(
        private CompanyService $companyService
    ) {
    }

    public function create(CompanyRequest $request)
    {
        $validated = $request->validated();
        $this->companyService->create($request->all());
    }
}
