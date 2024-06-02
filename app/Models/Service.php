<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    /**
     * Get the add-ons for the service.
     */
    public function servicesIncluded()
    {
        return $this->hasMany(ServicesIncluded::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function thumbnail() {
        return $this->thumbnail ? "https://buildforyou.s3.ap-southeast-1.amazonaws.com/"."thumbnail/".Auth::id()."/".$this->thumbnail : "https://buildforyou.s3.ap-southeast-1.amazonaws.com/default_service.jpg";
    }
}
