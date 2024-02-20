<?php

namespace App\Http\Controllers;

use App\Models\EuclPassword;
use App\Models\ServiceBalance;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $password;
    public function __construct()
    {
        $this->password = EuclPassword::latest()->first()->password;
    }

    public function generatePassword()
    {
        $password = "";
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $chars_length = strlen($chars);
        for ($i = 0; $i < 8; $i++) {
            $password .= $chars[rand(0, $chars_length - 1)];
        }
        return $password;
    }
    public function updateIpositaBalance($service_provider_id, $service_id, $amount)
    {
        $branchBalance = ServiceBalance::query()
            ->where('service_provider_id', '=', $service_provider_id)
            ->where('service_id', '=', $service_id)
            ->first();
        $newBalance = $branchBalance->balance + $amount;
        $branchBalance->update(['balance' => $newBalance]);
    }
}
