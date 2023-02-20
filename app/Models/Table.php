<?php

namespace App\Models;

use App\Company\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use HasFactory, HasUuids, SoftDeletes, CompanyTrait;

    protected $fillable = [
        'identify',
        'description'
    ];

    public function search(array $data)
    {
        return $this->where(function ($query) use ($data) {
            if (!empty($filter = $data['search'] ?? null)) {
                $query->where('identify', $filter)
                ->orWhere('description', 'like', "%{$filter}%");
            }
        });
    }
}
