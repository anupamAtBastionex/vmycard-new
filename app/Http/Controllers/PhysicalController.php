<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utility; 
use App\Models\User;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PhysicalController extends Controller
{
    public function index(Request $request){
        $data = $request->all();
        return view('plan.Physical');
    }
}