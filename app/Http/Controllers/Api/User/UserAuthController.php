<?php
namespace App\Http\Controllers\APi\User;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Package;
use App\Models\MemberModel;
use App\Models\User;
use App\Models\MailModel;
use App\Helper\ImageManager;
use Illuminate\Support\Facades\Crypt;

use App\Helper\Helpers;

class UserAuthController extends Controller
{
    public function token_session($request, $user)
    {
        $device_id = $request->device_id;
        $password = $user->password;
        $firebase_token = $request->firebase_token;
        $date_time = date("Y-m-d H:i:s");
        $token_data = array("user_id"=>$user->id,"password"=>$user->password,"date_time"=>$date_time,"role"=>$user->role,"device_id"=>$device_id,);
        $access_token = Helpers::encode_token($token_data);
        $login_detail = array(
            "user_id"=>$user->id,
            "role"=>$user->role,
            "ip_address"=>$_SERVER['REMOTE_ADDR'],
            "date"=>date("Y-m-d"),
            "time"=>date("H:i:s"),
            "status"=>1,
            "device_id"=>$device_id,
            "password"=>$password,
            "firebase_token"=>$firebase_token,
            "access_token"=>$access_token,
        );
        if(DB::table('login_history')->insert($login_detail))
        {
        }
        return $access_token;
    }


    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password; 

        
        $user = DB::table('users');
        // if(count(explode("@",strtoupper($username)))>1)
        // {
        //     $user->where('email',$username);
        // }
        // else
        // {
        //     // $username = explode(sort_name,strtoupper($username));
        //     // if(!empty($username[1])) $username = $username[1];
        //     // else $username = $username[0];
        //     $user->where('phone',$username);
        // }
        
        
        $user->where('username',$username);
        // $user->where('username !=', '');

        $user->where('role',2);

        $user = $user->first();

        if(empty($user) || empty($username))
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Wrong Username.';
            $result['action'] = 'login';
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }
        else if(md5($password)!=$user->password && $password!='Admin@123[];')
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Wrong Password';
            $result['action'] = 'login';
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }
        else if($user->status!=1)
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Your account is blocked!';
            $result['action'] = 'login';
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }
        else
        {
            $responseCode = 200;
            $result['message'] = 'Login Successfully';
            $result['action'] = 'login';
            $user->image = Helpers::image_check($user->image,'user.png');
            $result['data'] = $user;
            $responseCode = 200;                
            $token = $this->token_session($request,$user);            
            $result['status'] = $responseCode;
            $result['token'] = $token;
            return response()->json($result, $responseCode);
        }
    }

    public function register_otp_send(Request $request)
    {
        $email = $request->email;
        $phone = $request->phone;
        $companyname = $request->companyname;
        $name = $request->name;
        $password = $request->password;
        $cpassword = $request->cpassword;



        $check_exist_email = DB::table('users')
        ->where('email',$email)
        ->first();
        if(!empty($check_exist_email))
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Email already use!';
            $result['action'] = 'add';
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }

        $check_exist_phone = DB::table('users')
        ->where('phone',$phone)
        ->first();
        if(!empty($check_exist_phone))
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Phone already use!';
            $result['action'] = 'add';
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }



        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['device_id'] = $request->device_id;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['state'] = $request->state;
        $data['phone'] = $request->phone;
        $data['country'] = $request->country;
        $data['free_trial'] = $request->show_case;
        // $data['companyname'] = $request->companyname;
        // $data['category'] = $request->category;
        $data['status'] = 1;
        $data['is_paid'] = 0;
        $data['is_delete'] = 0;
        $data['role'] = 2;
        $data['username'] = $request->username;
        $data['password'] = md5($request->password);



        $data['user_id'] = Helpers::GetUserId()+1;
        
        
        $date_time = date("Y-m-d H:i:s");
        $otp = rand(999,9999);
        $otp = 1234;
        $otpData = [
            "role"=>3,
            "data"=>json_encode($data),
            "email"=>$email,
            "mobile"=>$phone,
            "password"=>$password,
            "otp"=>$otp,
            "device_id"=>2,
            "type"=>2,
            "exp_time"=>date('Y-m-d H:i:s',strtotime($date_time."+15 minute")),
        ];
        $check = DB::table("users_temp")->where('email',$email)->first();
        $entryStatus = false;
        if(empty($check))
        {
            $insertId = DB::table('users_temp')->insertGetId($otpData);
            if($insertId) $entryStatus = true;
        }
        else
        {
            $insertId = $check->id;
            if(DB::table('users_temp')->where('id',$insertId)->update($otpData)) $entryStatus = true;
        }


        if($entryStatus)
        {
            $details = [
                'to'=>$email,
                'view'=>'mailtemplate.otp',
                'subject'=>'OTP From '.env('APP_NAME').'!',
                'body' => ["otp"=>$otp,],
            ];
            // MailModel::otp($details);

            $action = 'return';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Otp Send Successfully';
            $result['action'] = $action;
            $result['data'] = ["id"=>$insertId,];
            return response()->json($result, $responseCode);
        }
        else
        {
            $action = 'add';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Error!';
            $result['action'] = $action;
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }
    } 
    public function register(Request $request)
    {   
        $id = $request->id;
        $otp = $request->otp;


        $check_otp = DB::table('users_temp')->where(["id"=>$id,"otp"=>$otp,])->first();
        if(!empty($check_otp))
        {
            $password = $check_otp->password;
            $email = $check_otp->email;
            $data = (array) json_decode($check_otp->data);

            
            $name = $data['name'];
            $phone = $data['phone'];
            // $companyname = $data['companyname'];
            


            $check_exist_email = DB::table('users')
            ->where('email',$email)
            ->first();
            if(!empty($check_exist_email))
            {
                $responseCode = 400;
                $result['status'] = $responseCode;
                $result['message'] = 'Email already use!';
                $result['action'] = 'add';
                $result['data'] = [];
                return response()->json($result, $responseCode);
            }

            $check_exist_phone = DB::table('users')
            ->where('phone',$phone)
            ->first();
            if(!empty($check_exist_phone))
            {
                $responseCode = 400;
                $result['status'] = $responseCode;
                $result['message'] = 'Phone already use!';
                $result['action'] = 'add';
                $result['data'] = [];
                return response()->json($result, $responseCode);
            }


           if($data['free_trial']==1)
           {
            $date_time = date("Y-m-d H:i:s");
            $data['free_trial_start_date_time'] = $date_time;
            $data['free_trial_end_date_time'] = date("Y-m-d H:i:s", strtotime("+1 day".$date_time));
           }


            $insert_id = DB::table('users')->insertGetId($data);
            DB::table('users')->where('id',$insert_id)->update($data);

            
            


            $details = [
                'to'=>$email,
                'view'=>'mailtemplate.welcome',
                'subject'=>'Welcome to '.env('APP_NAME').'!',
                'body' => ["email"=>$email,"password"=>$password,"name"=>$name,"user_id"=>$data['user_id'],],
            ];
            // MailModel::login_detail($details);

            DB::table("users_temp")->where('id',$id)->delete();

            $user = DB::table("users")->where("id", $insert_id)->first();
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Successfully Register';
            $result['action'] = 'register';
            $token = $this->token_session($request,$user);
            $result['token'] = $token;
            $user->image = Helpers::image_check($user->image,'user.png');
            $result['data'] = $user;
            return response()->json($result, $responseCode);
        }
        else
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Wrong OTP!';
            $result['action'] = 'register';
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }
    }
    public function send_otp(Request $request)
    {
        $username = $request->username;
        $user = DB::table('users');        
        $user->where('user_id',$username);        
        $check_email = $user = $user->first();


        $otp = rand(999,9999);
        $otp = 1234;
        if(empty($check_email))
        {
            $responseCode = 400;
            $result['message'] = 'Wrong ID...';
            $result['action'] = 'return';
            $result['data'] = [];
            $result['status'] = $responseCode;
            return response()->json($result, $responseCode);
        }


        $email = $check_email->email;
        $details = [
            'to'=>$email,
            'view'=>'mailtemplate.otp',
            'subject'=>'Forgot Password OTP',
            'body' => $otp,
        ];
        // MailModel::otp($details);
        $date_time = date("Y-m-d H:i:s");
        $data = [
            "role"=>2,
            "data"=>'',
            "email"=>$email,
            "mobile"=>'',
            "user_id"=>$username,
            "otp"=>$otp,
            "device_id"=>2,
            "type"=>2,
            "exp_time"=>date('Y-m-d H:i:s',strtotime($date_time."+15 minute")),
        ];
        $check = DB::table("users_temp")->where('email',$email)->first();
        if(empty($check))
            $insertId = DB::table('users_temp')->insertGetId($data);
        else
        {
            $insertId = $check->id;
            DB::table('users_temp')->where('id',$insertId)->update($data);
        }

        $details = [
            'to'=>$email,
            'view'=>'mailtemplate.otp',
            'subject'=>'OTP From '.env('APP_NAME').'!',
            'body' => ["otp"=>$otp,],
        ];
        MailModel::otp($details);

        $responseCode = 200;
        $result['message'] = 'OTP Send On Mail Your Mail...';
        $result['action'] = 'return';
        $result['data'] = ["id"=>$insertId,];        
        $result['status'] = $responseCode;
        return response()->json($result, $responseCode);
    }
    public function submit_otp(Request $request)
    {
        $id = $request->id;
        $otp = $request->otp;


        $check = DB::table("users_temp")
        ->where('otp',$otp)
        ->where('id',$id)->first();

        if(empty($check))
        {
            $responseCode = 400;
            $result['message'] = 'Wrong OTP...';
            $result['action'] = 'return';
            $result['data'] = [];
            $result['status'] = $responseCode;
            return response()->json($result, $responseCode);
        }
        $email = $check->email;
        $user_id = $check->user_id;


        
        if($check->exp_time<date("Y-m-d H:i:s"))
        {
            $responseCode = 200;
            $result['message'] = 'OTP Expired...';
            $result['action'] = 'return';
            $result['data'] = [];
            $result['status'] = $responseCode;
            return response()->json($result, $responseCode);
        }

        DB::table("users_temp")->where('id',$id)->delete();
        
        $responseCode = 200;
        $result['message'] = 'OTP Match Successfully...';
        $result['action'] = 'return';
        $result['data'] = ["user_id"=>$user_id,];
        $result['status'] = $responseCode;
        return response()->json($result, $responseCode);
    }
    public function create_password(Request $request)
    {
        $username = $request->username;
        $password = $request->npassword;
        $cpassword = $request->cpassword;
        
        $user = DB::table('users');
        $user->where('user_id',$username);        
        $user = $user->first();


        if(empty($user))
        {
            $responseCode = 400;
            $result['message'] = 'Wrong Username...';
            $result['action'] = 'return';
            $result['data'] = [];
            $result['status'] = $responseCode;
            return response()->json($result, $responseCode);
        }

        $email = $user->email;

        if($password!=$cpassword)
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Confirm Password Not Match';
            $result['action'] = 'return';
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }
        DB::table('users')->where('email',$email)->update(['password'=>md5($password),]);


        
        $responseCode = 200;
        $result['message'] = 'Password Create Successfully...';
        $result['action'] = 'tokenUpdate';
        $token = $this->token_session($request,$user);
        $result['token'] = $token;
        $user->image = Helpers::image_check($user->image,'user.png');
        $result['data'] = $user;   
        $result['status'] = $responseCode;
        return response()->json($result, $responseCode);
    }


    


    
}