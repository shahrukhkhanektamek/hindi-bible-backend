<?php
namespace App\Http\Controllers\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Transaction;
use App\Helper\Helpers;

class PaymentController extends Controller
{
    protected $user_id = null;
    public function __construct()
    {
        $authToken = request()->header('Authorization');
        $user = Helpers::decode_token($authToken);
        if ($user) {
            $this->user_id = $user->user_id;
        }
    }

    

    public function create_transaction(Request $request)
    {
        $user_id = $this->user_id;
        $type = $request->type; // 1=package,2=video,3=contribution
        $payment_type = $request->payment_type; // 1=india,2=international

        $package = DB::table("package")->first();

        $user = DB::table("users")->where(["id"=>$user_id,])->first();
        if(!empty($user))
        {
            $order_id = time().$user_id;
            $data['order_id'] = $order_id;
            $data['payment_type'] = $payment_type;
            $data['p_type'] = $type;
            $data['type'] = 1;
            $data['user_id'] = $user->id;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['mobile'] = $user->phone;

            $data['p_id'] = $package->id;
            $data['amount'] = $package->payable_price;
            $data['gst'] = $package->gst;
            $data['payable_price'] = $package->cost;



            $id = Transaction::create_transaction($data);
            if($id)
            {
                $url = url("pay?id=".$id);
                $responseCode = 200;
                $result['status'] = $responseCode;
                $result['message'] = 'Success!';
                $result['action'] = 'return';
                $result['data'] = ["id"=>$id,"url"=>$url,];
                return response()->json($result, $responseCode);
            }
            else
            {
                $responseCode = 400;
                $result['status'] = $responseCode;
                $result['message'] = 'Something Wrong!';
                $result['action'] = 'return';
                $result['data'] = [];
                return response()->json($result, $responseCode);
            }
        }
        else
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Something Wrong!';
            $result['action'] = 'return';
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }


    }

    public function check_transaction_status(Request $request)
    {
        $user_id = $this->user_id;
        $id = $request->id;
        $user = DB::table("users")->where(["id"=>$user_id,])->first();
        if(!empty($user))
        {
            $transaction = DB::table("transaction")->where(["status"=>1,"user_id"=>$user_id,"id"=>$id,])->first();
            if(!empty($transaction))
            {
                $responseCode = 200;
                $result['status'] = $responseCode;
                $result['message'] = 'Success!';
                $result['action'] = 'return';
                $result['data'] = $transaction;
                return response()->json($result, $responseCode);
            }
            else
            {
                $responseCode = 400;
                $result['status'] = $responseCode;
                $result['message'] = 'Unpaid!';
                $result['action'] = 'return';
                $result['data'] = [];
                return response()->json($result, $responseCode);
            }
        }
        else
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Something Wrong!';
            $result['action'] = 'return';
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }
    }



    public function pay(Request $request)
    {
        $id = $request->id;
        $transaction = DB::table('transaction')->where("id",$id)->where("status",0)->first();
        if(!empty($transaction))
        {
            $payment_setting = DB::table("payment_setting")
            ->where("status",1)->get();
            $count = count($payment_setting);
            if($count==1)
            {
                $keys = json_decode($payment_setting[0]->data);
                return redirect(route($keys->prefix.'.make-payment').'?id='.$id);
            }
            else
            {
                return view('payment/payment-mode/index',compact('payment_setting','id'));
            }                      
        }
        else
        {
            return 'Error...';
        }

        
    }

    public function payment_success(Request $request)
    {
        $setting = \App\Models\Setting::get();
        $main_setting = $setting['main'];
        $data['setting'] = $setting;
        $data['main_setting'] = $main_setting;
        return view('payment/payment-success',compact('setting','main_setting'));
    }

    public function payment_block(Request $request)
    {
        $setting = \App\Models\Setting::get();
        $main_setting = $setting['main'];
        $data['setting'] = $setting;
        $data['main_setting'] = $main_setting;
        return view('payment/payment-block',compact('setting','main_setting'));
    }

    public function payment_faild(Request $request)
    {
        $setting = \App\Models\Setting::get();
        $main_setting = $setting['main'];
        $data['setting'] = $setting;
        $data['main_setting'] = $main_setting;
        return view('payment/payment-faild',compact('setting','main_setting'));
    }
    
}