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

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function buyer(){
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    
    public function milestones()
    {
        return $this->hasMany(ProjectTracking::class);
    }

    public function review() {
        return $this->hasMany(Review::class);
    }
}

