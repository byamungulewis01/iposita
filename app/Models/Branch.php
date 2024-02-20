<?php

namespace App\Models;

use App\FileManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use OwenIt\Auditing\Contracts\Auditable;

class Branch extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    const BRANCH_TYPE_EXTERNAL = 'External';

    /**
     * function decrypt id on route model binding
     */
    public function resolveRouteBinding($value, $field = null)
    {
        $id = decryptId($value);
        return $this->find($id) ?? abort(404, "Branch not found");
    }

    public function province(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
    public function district(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(District::class);
    }
    public function sector(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }

    public function topups(){
        return $this->hasMany(BranchTopup::class);
    }

    public function services(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Service::class,'branch_services','branch_id','service_id')
            ->withPivot('service_provider_id');
    }
    public function getIsExternalAttribute($value): bool
    {
        return $this->branch_type == self::BRANCH_TYPE_EXTERNAL;
    }
    public function getContractAttribute($value): ?string
    {
        return !$value ? null : Storage::url(FileManager::BRANCH_CONTRACT_PATH . $value);
    }


}
