<?php

namespace App\Company;

class ManagerCompany
{
    public function getCompanyIdentify()
    {
        return auth()->check() ? auth()->user()->company_id : '';
    }

    public function getCompany()
    {
        return auth()->check() ? auth()->user()->company : '';
    }

    public function isAdmin(): bool
    {
        return in_array(auth()->user()->email, config('company.admins'));
    }
}
