<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopupTransfer extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function from_service_provider()
    {
        return $this->belongsTo(ServiceProvider::class, 'from_service_provider_id');
    }

    public function to_service_provider()
    {
        return $this->belongsTo(ServiceProvider::class, 'to_service_provider_id');
    }

    public function from_service()
    {
        return $this->belongsTo(Service::class, 'from_service_id');
    }

    public function to_service()
    {
        return $this->belongsTo(Service::class, 'to_service_id');
    }

}
