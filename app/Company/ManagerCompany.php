<?php

namespace App\Company;

use App\Models\Permission;

class ManagerCompany
{
    public function getCompanyIdentify(): string
    {
        if (request()->company) {
            return request()->company ?: '';
        }

        return auth()->check() ? auth()->user()->company_id : '';
    }

    public function getCompany(): string
    {
        return auth()->check() ? auth()->user()->company : '';
    }

    public function isAdmin(): bool
    {
        return in_array(auth()->user()->email, config('company.admins'));
    }

    public function getPermissionByCompany(): array
    {
        if (!auth()->check()) {
            return [];
        }

        $dataPermissions = [];

        foreach (auth()->user()->company->plan->profiles as $profile) {
            foreach ($profile->permissions as $permission) {
                array_push($dataPermissions, $permission);
            }
        }

        return $dataPermissions;
    }
}
