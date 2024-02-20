<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Service extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    public function charges()
    {
        return $this->hasMany(ServiceCharges::class,'service_id');
    }

    public function branchService()
    {
        return $this->hasMany(BranchService::class,'service_id');
    }
    public function provider()
    {
        return $this->belongsTo(Provider::class,'provider_id');
    }
    public function serviceProviders()
    {
        return $this->BelongsToMany(ServiceProvider::class,'service_charges','service_id','service_provider_id');
    }

}
