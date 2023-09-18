<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\User; 
use App\Models\Utility;

class TccController extends Controller
{
    public function index()
    {
        return view('layouts.tcc');
    }

    public function refund()
    {
        return view('layouts.refund');
    }
}