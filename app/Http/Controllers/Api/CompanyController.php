<?php
namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\Api\CompanyService;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\AuthCompanyRequest;

class CompanyController extends Controller
{
    public function __construct(
        private CompanyService $companyService
    ) {
    }

    public function create(CompanyRequest $request)
    {
        $request->validated();
        return $this->companyService->create($request);
    }

    public function update(CompanyRequest $request)
    {
        $request->validated();
        return $this->companyService->update($request);
    }

    public function delete(Request $request)
    {
        return $this->companyService->delete($request->get('id'));
    }

    public function get(Request $request)
    {
        return $this->companyService->get($request->get('id'));
    }

    public function getAll(Request $request)
    {
        return $this->companyService->getAll();
    }

    public function authenticate(AuthCompanyRequest $request)
    {
        return $this->companyService->authenticate($request->get('token'));
    }
}