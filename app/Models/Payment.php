<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'amount',
        'payment_date',
        'payment_status',
        'confirmation_image_url',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function confirmation_image_url() {
        return "https://buildforyou.s3.ap-southeast-1.amazonaws.com/".'payments/'. $this->order->buyer_id .'/'. $this->confirmation_image_url;
    }
}
