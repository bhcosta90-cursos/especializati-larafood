<?php

namespace App\Observers;

use App\Models\Plan;

class PlanObserver
{
    /**
     * Handle the Plan "creating" event.
     */
    public function creating(Plan $plan): void
    {
        $plan->url = str()->kebab($plan->name);
    }

    /**
     * Handle the Plan "updating" event.
     */
    public function updating(Plan $plan): void
    {
        $plan->url = str()->kebab($plan->name);
    }
}
