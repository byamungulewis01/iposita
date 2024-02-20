<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function districtsByProvince($id)
    {
        $districts = District::where('province_id',$id)->get();
        return $districts;

    }
}
