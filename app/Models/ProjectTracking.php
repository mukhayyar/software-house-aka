<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTracking extends Model
{
    use HasFactory;

    protected $table = 'project_tracking';

    protected $fillable = [
        'order_id',
        'title',
        'description',
        'due_date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
