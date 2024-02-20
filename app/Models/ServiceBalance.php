<?php

namespace App\Models;

use App\FileManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBalance extends Model
{
    use HasFactory;

    protected $guarded  = [];

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
