<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utility; 
use App\Models\User;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\Business;
use App\Models\Businessqr;


class PhysicalController extends Controller
{
    public function index(Request $request){
        $data=$this->getBusin($request);
        return view('plan.Physical',$data);
    }


    public function getCont22(Request $request)
    {
        $user = \Auth::user();
        $business_id = $user->current_business;
        $business = Business::where('id', $business_id)->first();
        $qr_detail = Businessqr::where('business_id', $business_id)->first();
        $validatedData = $request->validate([
            'card_design_id' => 'required'
        ]);
        $template_folder_id=$request->card_design_id;
        $data = [
            'title' => $business->title,
            'designation' => $business->designation,
            'qr_detail' => $qr_detail,
        ];
        $htmlContent = view('physical-cards.'.$template_folder_id.'.index')->with($data)->render();
        return response()->json(['html' => $htmlContent]);
    }


    public function getCont(Request $request)
    {
        $template_folder_id=$request->card_design_id;
        $data=$this->getBusin($request);
        $htmlContent = view('physical-cards.'.$template_folder_id.'.index')->with($data)->render();
        return response()->json(['html' => $htmlContent]);
    }


    public function getBusin(Request $request){
        $user = \Auth::user();
        $business_id = $user->current_business;
        $business = Business::where('id', $business_id)->first();
        $business_id=2;
        $qr_detail = Businessqr::where('business_id', $business_id)->first();
        $users = User::find(\Auth::user()->creatorId());
            $plan = Plan::find($users->plan);
            if ($plan->storage_limit > 0) {
                $storage_limit = ($users->storage_limit / $plan->storage_limit) * 100;
            } else {
                $storage_limit = 0;
            }
        $businessData = \App\Models\Business::where('id',$users->current_business)->where('created_by', \Auth::user()->creatorId())->first();
        $qr_detail='';
        if(!empty($businessData))
        {
            $qr_detail = \App\Models\Businessqr::where('business_id', $businessData->id)->first();
        }
        $data = [
            'title' => $business->title,
            'designation' => $business->designation,
            'qr_detail' => $qr_detail,
            'businessData'=> $businessData,
            'plan'=>$plan

        ];
        return $data;
    }
}