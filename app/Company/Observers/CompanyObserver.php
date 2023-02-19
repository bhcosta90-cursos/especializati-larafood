<?php

namespace App\Company\Observers;

use App\Company\ManagerCompany;
use Illuminate\Database\Eloquent\Model;

class CompanyObserver
{
    /**
     * Handle the Model "creating" event.
     */
    public function creating(Model $plan): void
    {
        $plan->company_id = app(ManagerCompany::class)->getTenantIdentify();
    }
}
