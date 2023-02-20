<?php

namespace App\Models;

use App\Company\Traits\CompanyTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, HasUuids, SoftDeletes, CompanyTrait;

    protected $fillable = [
        'title',
        'flag',
        'image',
        'price',
        'description',
    ];

    public function search(array $data)
    {
        return $this->where(function ($query) use ($data) {
            if (!empty($filter = $data['search'] ?? null)) {
                $query->where('name', 'like', "%{$filter}%")
                ->orWhere('description', 'like', "%{$filter}%");
            }
        });
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
