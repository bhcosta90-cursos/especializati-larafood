<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Plan;

class CompanyService
{
    public function make(Plan $plan, array $data)
    {
        $objCompany = $this->createCompany($plan, $data);
        return $this->createUser($objCompany, $data);
    }

    private function createCompany(Plan $plan, array $data)
    {
        return $plan->companies()->create([
            'email' => $data['email'],
            'name' => $data['company_name'],
            'cnpj' => $data['company_cnpj'],
            'subscription' => now(),
            'expires_at' => now()->addDay(7),
        ]);
    }

    private function createUser(Company $company, array $data)
    {
        return $company->users()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
