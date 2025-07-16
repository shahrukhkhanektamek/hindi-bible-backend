<?php
namespace App\Http\Controllers\APi\User;


use App\Helper\Helpers;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Custom;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Helper\ImageManager;
use App\Models\User;
use App\Models\Package;
 
class UserProfileController extends Controller
{
     protected $arr_values = array(
        'routename'=>'user.profile.', 
        'title'=>'Profile', 
        'table_name'=>'users',
        'page_title'=>'Profile',
        "folder_name"=>user_view_folder.'/profile',
        "upload_path"=>'upload/',
        "keys"=>'id,name',
       );  

        protected $user_id = null;

        public function __construct()
        {
            $authToken = request()->header('Authorization');
            $user = Helpers::decode_token($authToken);
            if ($user) {
                $this->user_id = $user->user_id;
            }
        }


    public function index(Request $request)
    {
        
    }

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
   
    
    public function get_profile(Request $request)
    {
        $id = $request->id;
        $user_id = $this->user_id;        

        $data = DB::table("users")->where(["id"=>$user_id,])->first();
        $data->image2 = [["uri"=>Helpers::image_check($data->image,'user.png'),]];
        $data->image = Helpers::image_check($data->image,'user.png');

        if(!empty($data))
        {
            $action = 'detail';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['action'] = $action;
            $result['data'] = $data;
            return response()->json($result, $responseCode);
        }
        else
        {
            $action = 'detail';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Error!';
            $result['action'] = $action;
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }        
    }
    public function update_profile(Request $request)
    {
        $entryStatus = false;
        $id = $request->id;

        $user_id = $this->user_id;
        
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->mobile;
        $data['country'] = $request->country;
        // $data['state'] = $request->state;
        // $data['city'] = $request->city;
        // $data['category'] = $request->category;
        // $data['companyname'] = $request->companyname;
        $data['address'] = $request->address;

        DB::table("users")->where(["id"=>$user_id,])->update($data);
        $entryStatus = true;
        

        if($entryStatus)
        {
            $user = DB::table('users')->where('id',$user_id)->first();
            $token = $this->token_session($request,$user);
            $action = 'tokenUpdate';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['action'] = $action;
            $user->image = Helpers::image_check($user->image,'user.png');
            $result['data'] = $user;
            $result['token'] = $token;
            return response()->json($result, $responseCode);
        }
        else
        {
            $action = 'tokenUpdate';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Error!';
            $result['action'] = $action;
            $user->image = Helpers::image_check($user->image,'user.png');
            $result['data'] = $user;
            $result['token'] = $token;
            return response()->json($result, $responseCode);
        }        
    }
    public function update_profile_photo(Request $request)
    {
        $entryStatus = false;
        $id = $request->id;

        $user_id = $this->user_id;
        $profilephoto = $request->profilephoto;

        if(!empty($profilephoto))
        {
            foreach ($profilephoto as $key => $value)
            {
                $data['image'] = ImageManager::uploadAPiImage('upload','jpg',$value['string']);
            }            
        }
        
        if(empty($data))
        {
            $action = 'tokenUpdate';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Select Image!';
            $result['action'] = $action;
            return response()->json($result, $responseCode);
        }


        DB::table("users")->where(["id"=>$user_id,])->update($data);
        $entryStatus = true;



        if($entryStatus)
        {
            $user = DB::table('users')->where('id',$user_id)->first();
            $token = $this->token_session($request,$user);
            $action = 'tokenUpdate';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['action'] = $action;
            $user->image = Helpers::image_check($user->image,'user.png');
            $result['data'] = $user;
            $result['token'] = $token;
            return response()->json($result, $responseCode);
        }
        else
        {
            $action = 'tokenUpdate';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Error!';
            $result['action'] = $action;
            $user->image = Helpers::image_check($user->image,'user.png');
            $result['data'] = $user;
            $result['token'] = $token;
            return response()->json($result, $responseCode);
        }        
    }
    public function update_password(Request $request)
    {
        $entryStatus = false;
        $id = $request->id;

        $user_id = $this->user_id;
        $username = $request->username;
        $password = $request->password;
        $cpassword = $request->cpassword;
        
        // if($password!=$cpassword)
        // {
        //     $responseCode = 400;
        //     $result['status'] = $responseCode;
        //     $result['message'] = 'Confirm Password Not Match';
        //     $result['action'] = 'return';
        //     $result['data'] = [];
        //     return response()->json($result, $responseCode);
        // }

        if(empty($username))
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Enter Username!';
            $result['action'] = 'return';
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }
        if(empty($password))
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Enter Password!';
            $result['action'] = 'return';
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }

        $data['username'] = $username;
        $data['password'] = md5($password);

        DB::table("users")->where(["id"=>$user_id,])->update($data);
        $entryStatus = true;
        

        if($entryStatus)
        {
            $user = DB::table('users')->where('id',$user_id)->first();
            $token = $this->token_session($request,$user);
            $action = 'tokenUpdate';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['action'] = $action;
            $user->image = Helpers::image_check($user->image,'user.png');
            $result['data'] = $user;
            $result['token'] = $token;
            return response()->json($result, $responseCode);
        }
        else
        {
            $action = 'tokenUpdate';
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Error!';
            $result['action'] = $action;
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }        
    }

 

}