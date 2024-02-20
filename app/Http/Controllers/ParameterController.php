<?php

namespace App\Http\Controllers;

use App\Models\SysParameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    public function index()
    {
        $user=auth()->user();
        $paramenters = SysParameter::query()->get();
        return view('admin.settings.parameters', compact('paramenters'));
    }
}
