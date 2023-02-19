<?php

namespace App\Company;

class ManagerCompany
{
    public function getTenantIdentify()
    {
        return auth()->check() ? auth()->user()->company_id : '';
    }

    public function getTenant()
    {
        return auth()->check() ? auth()->user()->tenant : '';
    }

    public function isAdmin(): bool
    {
        return in_array(auth()->user()->email, config('tenant.admins'));
    }
}
