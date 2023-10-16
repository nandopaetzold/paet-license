<?php

namespace App\Service;

use App\Models\Company;

class CompanyService
{

    
    public function create($data)
    {
        $company = new Company();
        $company->name = $data['name'];
        $company->email = $data['email'];
        $company->password = bcrypt($data['password']);
        $company->save();

        return $company;
    }

    public function update($data, $company)
    {
        $company->name = $data['name'];
        $company->email = $data['email'];
        $company->save();

        return $company;
    }

    public function delete($company)
    {
        $company->delete();
    }
    

    public function findByEmail($id)
    {
        return Company::where('email', $id)->first();
    }
}
