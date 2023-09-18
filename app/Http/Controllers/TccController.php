<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\User;
use App\Models\Utility;

class TccController extends Controller
{
    public function index()
    {
        // die("Adfa");
        return view('layouts.tcc');
    }

    public function refund()
    {
        // die("Adfa");
        return view('layouts.refund');
    }
}