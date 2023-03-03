<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasUuids;

    protected $table = 'order_product';

    public $timestamps = false;

    protected $fillable = [
        'quantity',
        'price',
        'product_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
