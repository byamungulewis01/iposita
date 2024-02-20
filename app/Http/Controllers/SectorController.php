<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function sectorsByDistrict($id)
    {
        $sectors = Sector::where('district_id',$id)->get();
        return $sectors;
    }
}
