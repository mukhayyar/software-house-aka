<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'buyer_id',
        'service_id',
        'note',
        'order_date',
        'status',
        'completion_date',
    ];
}

