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
use App\Models\CardRequest;
use App\Models\ContactInfo;


class PhysicalController extends Controller
{
    public function index(Request $request){
        $data=$this->getBusin($request);
        return view('plan.physical',$data);
    }


    public function view_request_order(Request $request){
        $user = \Auth::user();
        $users = User::find(\Auth::user()->creatorId());
        // echo "<pre>";
        // print_r($users->id);
        // die($users->id);

        // Route::get('sadmin_request_cards/{slug?}', [PhysicalController::class, 'sadmin_view_request_order'])->name('physical.sadmin_view_request_order');
        
        $data['card_request_deatails'] = CardRequest::where('user_id', '=', $users->id)->get();
        return view('physical-cards.view_orders',$data);
    }


    public function sadmin_view_request_order(Request $request){
        $user = \Auth::user();
        $users = User::find(\Auth::user()->creatorId());
        $data['card_request_deatails'] = CardRequest::get();
        return view('physical-cards.sadmin_view_orders',$data);
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
        $qr_detail = Businessqr::where('business_id', $business_id)->first();
        $users = User::find(\Auth::user()->creatorId());
            $plan = Plan::find($users->plan);
            if ($plan->storage_limit > 0) {
                $storage_limit = ($users->storage_limit / $plan->storage_limit) * 100;
            } else {
                $storage_limit = 0;
            }
        $businessData = \App\Models\Business::where('id',$users->current_business)->where('created_by', \Auth::user()->creatorId())->first();
        if(!empty($businessData))
        {
            $qr_detail = \App\Models\Businessqr::where('business_id', $businessData->id)->first();
        }

        // echo "<pre>";
        // print_r($qr_detail); die("Asfa");


        $SER=env('APP_URL');

        if (isset($business->logo)) {
            $logo_p=$SER."/storage/card_logo/$business->logo";
        } else {
            $logo_p=$SER."/assets/card-images/logo2.png";
        }
         

        $data = [
            'title' => isset($business->title) ? $business->title : null,
            'designation' => isset($business->designation) ? $business->designation : null,
            'qr_detail' => isset($qr_detail) ? $qr_detail : null,
            'businessData'=>isset($businessData) ? $businessData : null,
            'plan'=>isset($plan) ? $plan : null,
            'user'=>isset($user) ? $user : null,
            'logo_white'=>$logo_p,
            'logo_black'=>$logo_p

        ];
        // echo "<pre>";
        // print_r($plan->qty_physical_card); die("Asdf");
        return $data;
    }

    public function card_request(Request $request)
    {  
        $user = \Auth::user();
        $business_id = $user->current_business;
        $business = Business::where('id', $business_id)->first();
        $qr_detail = Businessqr::where('business_id', $business_id)->first();
        $users = User::find(\Auth::user()->creatorId());
        $plan = Plan::find($users->plan);
        if ($plan->storage_limit > 0) {
            $storage_limit = ($users->storage_limit / $plan->storage_limit) * 100;
        } else {
            $storage_limit = 0;
        }

        $businessData = \App\Models\Business::where('id',$users->current_business)->where('created_by', \Auth::user()->creatorId())->first();
        if(!empty($businessData))
        {
            $qr_detail = \App\Models\Businessqr::where('business_id', $businessData->id)->first();
        }

        $SER=env('APP_URL');
        if($business->logo==''){
            $logo_p=$SER."/assets/card-images/logo2.png";
        }else{
            $logo_p=$SER."/storage/card_logo/$business->logo";
        }

        $contactinfo = ContactInfo::where('business_id', $business->id)->first();
        $contactinfo_content = [];
        if (!empty($contactinfo->content)) {
            $contactinfo_content = json_decode($contactinfo->content);
        }
     
        $contacts = (array) $contactinfo_content;
        // echo "<pre>"; print_r($contacts); die("asf");

        $c_phone='';
        $c_email='';
        $c_web_url='';
        $c_Address = '';

        foreach ($contacts as $item) {
            if (isset($item->Phone)) {
                $c_phone = $item->Phone;
            }
            if (isset($item->Email)) {
                $c_email = $item->Email;
            }
            if (isset($item->Web_url)) {
                $c_web_url = $item->Web_url;
            }
            if (isset($item->Address)) {
                if (isset($item->Address)) {
                $c_Address = $item->Address->Address;
                }
            }
        }

        $cardrequest = new CardRequest();
        $cardrequest->user_id = $request->uid;
        $cardrequest->business_id = $request->bid;
        $cardrequest->card_id = $request->cid;
        $cardrequest->logo_url = $logo_p;
        $cardrequest->qr_code = isset($qr_detail->id) ? $qr_detail->id : null;
        $cardrequest->name = $business->title;
        $cardrequest->designation = $business->designation;
        $cardrequest->phone = $c_phone;
        $cardrequest->email =  $c_email;
        $cardrequest->contact_address = $c_Address;
        $cardrequest->subtitle =  $business->sub_title;
        $cardrequest->website_url = $c_web_url;
        $cardrequest->status = 1;
        // $cardrequest->card_url = 1;
        $cardrequest->ordered_at = date('Y-m-d');



        $users = User::find(\Auth::user()->creatorId());
        $plan = Plan::find($users->plan);
        $already_requested=$this->FindQtyPhyCard();
        //if($plan->qty_physical_card < $already_requested){
        if(1==1 ){
            $cardrequest->save();
            return redirect()->back()->with('success','Physical Card Request Successfully Added.');
        }else{
            return redirect()->back()->with('error', 'Physical Card could not be request |  Please Upgrade your plan');
        }
     }

    public function FindQtyPhyCard()
    {
        $users = User::find(\Auth::user()->creatorId());
        $Tcount=CardRequest::where('user_id', $users->id)->count();
        return $Tcount;
    }


    public function action_popup($p_id)
    {
        $data=array();
        //1-Pending 2-Printed 3-Dispacthed 4-Failed 5-Done
        $data['p_status']=array('Select','Pending','Printed','Dispacthed','Failed','Done');
        $data['p_id']=$p_id;
        return view('physical-cards.action_popup',$data);
    }

    public function pstatus_store(Request $request)
    {
        $p_comment=$request->p_comment;
        $p_id=$request->p_id;
        $p_status=$request->p_status;
        \DB::table('card_requests')->where('id', $p_id)->update(['comment' => $p_comment,'status' =>$p_status]);
        return redirect()->back()->with('success', 'Status Change successfully');
    }
}