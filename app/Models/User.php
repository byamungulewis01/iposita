<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property mixed $branch_id
 * @property mixed $id
 */
class User extends Authenticatable implements Auditable
{
    use HasApiTokens, HasFactory, Notifiable,HasPermissions, HasRoles,
        \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function getNationalIdAttachments(){
        return $this->nid_attachment ? \Storage::url("public/files/users".$this->nid_attachment) : null;
    }
    public function  getPhoto()
    {
        return $this->photo ? \Storage::url("public/files/users".$this->photo) : null;
    }

    public function  getIpositaForm()
    {
        return $this->iposita_form ? \Storage::url("public/files/users".$this->iposita_form) : null;
    }

    public function histories(){
        return $this->hasMany(UserFlowHistory::class,'user_id');
    }

    public function doneBy(){
        return $this->belongsTo(User::class,'done_by','id');
    }
}
