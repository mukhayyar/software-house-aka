<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesIncluded extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'services_included';

    protected $fillable = ['title', 'service_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
