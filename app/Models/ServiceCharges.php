<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Yajra\DataTables\Html\Editor\Fields\BelongsTo;

class ServiceCharges extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $guarded=[];


    public function service(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
    public function serviceProvider(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ServiceProvider::class);
    }
}
