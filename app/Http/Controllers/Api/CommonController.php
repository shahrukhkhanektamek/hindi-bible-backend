<?php
namespace App\Http\Controllers\APi;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


use App\Helper\Helpers;

class CommonController extends Controller
{        
    public function country(Request $request)
    {
        $data = DB::table("countries")->get();
        
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'return';
        $result['data'] = $data;
        return response()->json($result, $responseCode);
    }

    public function package(Request $request)
    {
        $data = DB::table("package")->get();
        
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'return';
        $result['data'] = $data;

        return response()->json($result, $responseCode);
    }
    public function payment_detail(Request $request)
    {
        $data = DB::table("package")->get();
        
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'return';
        $result['data'] = $data;

        return response()->json($result, $responseCode);
    }
    public function state(Request $request)
    {
        $data = DB::table("states")
        // ->limit(2)
        ->get();
        
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'return';
        $result['data'] = $data;

        return response()->json($result, $responseCode);
    }
    public function appVisit(Request $request)
    {
        $device_id = $request->device_id;
        $device_detail = $request->device_detail;

        $data['device_id'] = $device_id;
        $data['device_detail'] = $device_detail;
        $data['add_date_time'] = date("Y-m-d H:i:s");
        DB::table("visiters")->insert($data);
        
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'return';
        $result['data'] = [];
        return response()->json($result, $responseCode);
    }
    

    public function app_setting(Request $request)
    {
        $device_id = $request->device_id;
        $date_time = date("Y-m-d H:i:s");
        

        $user = DB::table("users")->where(["device_id"=>$device_id,])->first();
        $data['device_is_register'] = empty(!$user)?1 :0 ;

        $free_trial = 0;
        if(@$user->free_trial==1)
        {
            $free_trial = $user->free_trial;
            if($user->free_trial_end_date_time<date("Y-m-d H:i:s"))
            $free_trial = 2;
        }
        $data['free_trial'] = $free_trial;
        
        $data['total_subscribe'] = 100;
        $data['total_thumb'] = 100;
        $data['total_heart'] = 100;

        $intro_video = DB::table("intro_video")->select('name','type','video','description','image')->first();
        $intro_video->image = Helpers::image_check($intro_video->image);
        $data['intro_video'] = $intro_video;


        $payment_setting = DB::table("payment_setting")->select('name','data','status')->get();
        $payment_setting->transform(function ($item) {
            $item->key = @json_decode($item->data)->key;
            $item->salt = @json_decode($item->data)->salt;
            $item->prefix = @json_decode($item->data)->prefix;
            return $item;
        });
        $data['payment_setting'] = $payment_setting;
        
        $setting = DB::table("setting")->select('name','data')->where('name','main')->first();
        $data['payment_detail'] =json_decode($setting->data);


        $package = DB::table("package")->first();

        $start_date_time = date("Y-m-d", strtotime($date_time));
        $end_date_time = date("Y-m-d", strtotime("+1 month $date_time"));

        $data['detail'] = [
            "fees_string"=>"1 YEAR = $package->cost/-",
            "fees"=>$package->cost,
            "start_date_time"=>$start_date_time,
            "end_date_time"=>$end_date_time,
            "india"=>[
                "fees"=>$package->cost,
                "gst"=>$package->gst,
                "payable_price"=>$package->payable_price,
            ],
            "international"=>[
                "fees"=>$package->cost,
                "gst"=>$package->gst,
                "payable_price"=>$package->payable_price,
            ],

        ];

        $data['package'] = $check_package = Helpers::check_package(@$user->id);
        
        $device_id = $request->device_id;
        $device_detail = ($request->device_detail);

        $dataVisit['device_id'] = $device_id;
        $dataVisit['device_detail'] = $device_detail;
        $dataVisit['add_date_time'] = date("Y-m-d H:i:s");
        DB::table("visiters")->insert($dataVisit);
        
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'appSetting';
        $result['data'] = $data;

        return response()->json($result, $responseCode);
    }

    public function contactInquiry(Request $request)
    {
        $data = [];

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->mobile;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        $data['status'] = 1;
        $data['add_date_time'] = date("Y-m-d H:i:s");
        $data['update_date_time'] = date("Y-m-d H:i:s");

        if(DB::table("enquiry_contact")->insert($data))
        {
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['action'] = 'return';
            $result['data'] = $data;
        }
        else
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Error!';
            $result['action'] = 'return';
            $result['data'] = $data;
        }        

        return response()->json($result, $responseCode);
    }

    
    
    
}