<?php

namespace App\Company\Traits;

use App\Company\Observers\CompanyObserver;
use App\Company\Scopes\CompanyScope;

trait CompanyTrait
{
    public static function bootCompanyTrait()
    {
        static::observe(CompanyObserver::class);
        static::addGlobalScope(new CompanyScope);
    }
}
