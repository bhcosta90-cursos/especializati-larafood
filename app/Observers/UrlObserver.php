<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

class UrlObserver
{
    /**
     * Handle the Model "creating" event.
     */
    public function creating(Model $plan): void
    {
        $plan->url = str()->kebab($plan->name);
    }

    /**
     * Handle the Model "updating" event.
     */
    public function updating(Model $plan): void
    {
        $plan->url = str()->kebab($plan->name);
    }
}
