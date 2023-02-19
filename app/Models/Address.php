<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    public $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'street_address_1',
        'street_address_2',
        'country',
        'phone',
        'email',
        'optional'
    ];
}
