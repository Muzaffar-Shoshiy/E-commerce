<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderline extends Model
{
    use HasFactory;
    public $fillable = [
        'product_id',
        'order_id',
        'qty',
        'price'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
}
