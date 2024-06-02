<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $tabe = 'faqs';

    protected $fillable = ['service_id', 'question', 'answer'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
