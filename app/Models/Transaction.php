<?php

namespace App\Models;

use App\CPU\Helpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    const CREATED_AT = 'add_date_time';
    const UPDATED_AT = 'update_date_time';
    protected $table = 'transaction';    

    
    public static function create_transaction($data)
    {
        
        $date_time = date("Y-m-d H:i:s");
        $p_id = $data['p_id'];
        $user_id = $data['user_id'];

        $name = $data['name'];
        $email = $data['email'];
        $mobile = $data['mobile'];

        $order_id = $data['order_id'];
        $order_amount = $data['amount'];
        $gst_amount = $data['gst'];
        $final_income = $data['payable_price'];

        DB::table("transaction")->where(["user_id"=>$user_id,"status"=>0,])->delete();

        $Transaction = new Transaction();
        $Transaction->order_id = $order_id;

        // $Transaction->name = $name;
        // $Transaction->email = $email;
        // $Transaction->phone = $mobile;

        $Transaction->p_id = $p_id;
        $Transaction->type = $data['type'];
        $Transaction->p_type = $data['p_type'];
        $Transaction->payment_type = $data['payment_type'];
        $Transaction->user_id = $data['user_id'];
        $Transaction->transaction_id = '';
        $Transaction->amount = $final_income;
        $Transaction->gst = $gst_amount;
        $Transaction->final_amount = $order_amount;
        $Transaction->add_date_time = $date_time;
        $Transaction->status = 0;
        $Transaction->is_delete = 0;
        $Transaction->save();
        return $id = $Transaction->id;
    }

    public static function insert_user_package($orders)
    {
        $user_id = $orders->user_id;
        $package_id = $orders->p_id;
        $type = $orders->p_type;
        $date_time = date("Y-m-d H:i:s");

        $package_name = '';
        if($type==1)
        {
            $package = DB::table("package")->where("id",$package_id)->first();
            $package_name = 'Package';
        }
        else
        {
            $package_name = '';
        }

        
        $start_date_time = date("Y-m-d H:i:s", strtotime($date_time));
        $end_date_time = date("Y-m-d H:i:s", strtotime("+1 year $date_time"));

        DB::table("user_package")->insert([
          "user_id"=>$user_id,
          "transaction_table_id"=>$orders->id,
          "type"=>$type,
          "package_name"=>$package_name,
          "package_id"=>$package_id,
          "date_time"=>date("Y-m-d H:i:s"),
          "start_date_time"=>$start_date_time,
          "end_date_time"=>$end_date_time,
          "status"=>1,
        ]);
        // DB::table("users")->where('id',$user_id)->update(["package_id"=>$package_id,"package_name"=>$package_name,]);

        // $check_user_package = DB::table('user_package')->where("user_id",$user_id)->where("transaction_id",$orders->transaction_id)
        // ->orderBy('id','desc')
        // ->get();
        // if($type2!=4)
        // {
        //   if(count($check_user_package)>1)
        //   {
        //     $check_user_package = $check_user_package[0];
        //     DB::table('user_package')->where("id",$check_user_package->id)->delete();
        //   }
        // }
    }

    public static function update_transaction($id)
    {
        $date_time = date("Y-m-d H:i:s");
        $transaction = DB::table('transaction')->where('id',$id)->first();
        DB::table('transaction')->where('id',$id)->update(
            [
                'status'=>1,
                'payment_date_time'=>$date_time,
            ]
        );
        $date = date("Y-m-d");
    }

}
