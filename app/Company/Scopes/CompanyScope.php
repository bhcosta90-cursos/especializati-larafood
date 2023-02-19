<?php

namespace App\Company\Scopes;

use App\Company\ManagerCompany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class CompanyScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where($model->getTable() . '.company_id', app(ManagerCompany::class)->getTenantIdentify());
    }
}
