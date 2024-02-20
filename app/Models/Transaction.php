<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * @property mixed $service_charge_id
 * @property mixed $customer_phone
 * @property mixed $amount
 * @property mixed $reference_number
 * @property mixed $charges
 * @property mixed $customer_name
 * @property mixed $charges_type
 * @property false|float|mixed $total_charges
 * @property mixed $branch_id
 * @property mixed $user_id
 * @property mixed|string $status
 */
class Transaction extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;

    protected $guarded=[];

    const PENDING = "Pending";
    const SUCCESS = "Success";
    const FAILED = "Failed";
    const ACTIVE = "Active";
    const INACTIVE = "Inactive";

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
    public function serviceCharges(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ServiceCharges::class,"service_charge_id");
    }
    public function doneBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,"user_id");
    }
}
