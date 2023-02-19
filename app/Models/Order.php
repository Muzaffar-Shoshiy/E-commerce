<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table = 'orders';
    public $fillable = [
        'user_id',
        'order_date',
        'address',
        'order_total',
        'payment_type',
        'status'
    ];
    public function addressess()
    {
        return $this->belongsTo(Address::class, 'user_id');
    }
    public function orderline()
    {
        return $this->hasMany(Orderline::class, 'order_id');
    }
}
