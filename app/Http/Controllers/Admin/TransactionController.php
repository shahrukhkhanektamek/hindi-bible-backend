<?php
namespace App\Http\Controllers\Admin;


use App\Helper\Helpers;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Custom;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;
use App\Helper\ImageManager;
use App\Models\Transaction;
use App\Models\User;
 
class TransactionController extends Controller
{
     protected $arr_values = array(
        'routename'=>'transaction.', 
        'title'=>'Transaction', 
        'table_name'=>'transaction',
        'page_title'=>'Transaction',
        "folder_name"=>'/transaction',
        "upload_path"=>'upload/',
        "page_name"=>'cource-detail.php',
        "keys"=>'id,name',
       );  

      public function __construct()
      {
         $this->arr_values['folder_name'] = env("admin_view_folder") . $this->arr_values['folder_name'];
        Helpers::create_importent_columns($this->arr_values['table_name']);
      }

    public function index(Request $request)
    {
        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "All ".$this->arr_values['page_title'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['submit_url'] = route($this->arr_values['routename'].'update');
        $data['back_btn'] = route($this->arr_values['routename'].'list');
        $data['edit_btn_url'] = route($this->arr_values['routename'].'edit');
        $data['view_btn_url'] = route($this->arr_values['routename'].'view');
        
        $data['keys'] = $this->arr_values['keys'];          
        $data['pagenation'] = array($this->arr_values['title']);
        $data['trash'] = '';
        return view($this->arr_values['folder_name'].'/index',compact('data'));
    }
    public function load_data(Request $request)
    {
      $limit = 12;
      $page = 1;
      $page1 = 1;
      $offset = 0;
      $status = 1;
      $table_id = 1;
      $listcheckbox = [];
      $filter_search_value = '';
      $keys = '';
      $where_query = "";
      $order_by = "id desc";
      $is_delete = 0;
      

      if(!empty($request->limit)) $limit = $request->limit;
      if(isset($request->status)) $status = $request->status;
      if(!empty($request->order_by)) $order_by = $request->order_by;
      if(!empty($request->filter_search_value)) $filter_search_value = $request->filter_search_value;



        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['back_btn'] = route($this->arr_values['routename'].'list');
        $data['edit_btn_url'] = route($this->arr_values['routename'].'edit');
        $data['view_btn_url'] = route($this->arr_values['routename'].'view');
        



      $data_list = Transaction::where([$this->arr_values['table_name'].'.status' => $status])
      ->leftJoin("users","users.id","=",$this->arr_values['table_name'].".user_id")


       ->select($this->arr_values['table_name'].".*","users.name as user_name","users.phone as user_phone","users.email as user_email","users.is_paid as is_paid","users.user_id as uid",
        DB::raw("CASE 
                    WHEN ".$this->arr_values['table_name'].".p_type = 1 THEN 'Package' 
                    WHEN ".$this->arr_values['table_name'].".p_type = 2 THEN 'Video' 
                    WHEN ".$this->arr_values['table_name'].".p_type = 3 THEN 'Contribution' 
                    ELSE 'Unknown' 
                 END as p_type_text"),

        DB::raw("CASE 
                    WHEN ".$this->arr_values['table_name'].".payment_type = 1 THEN 'India' 
                    WHEN ".$this->arr_values['table_name'].".payment_type = 2 THEN 'International' 
                    ELSE 'Unknown' 
                 END as payment_type_text")
   );
      
      if(!empty($filter_search_value))
      {
        $filter_search_value = explode(" ", $filter_search_value);
        foreach ($filter_search_value as $key => $value)
        {
            $data_list = $data_list->where('users.name','LIKE',"%{$value}%");            
            $data_list = $data_list->where('users.email','LIKE',"%{$value}%");            
            $data_list = $data_list->where('users.phone','LIKE',"%{$value}%");            
            $data_list = $data_list->where($this->arr_values['table_name'].'.transaction_id','LIKE',"%{$value}%");            
        }
      }




      $data_list = $data_list->latest()->paginate($limit);
        $view = View::make($this->arr_values['folder_name'].'/table',compact('data_list','data'))->render();
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'view';
        $result['data'] = ["list"=>$view,];
        return response()->json($result, $responseCode);
    }
    public function edit($id='')
    {   
        $id = Crypt::decryptString($id);
        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Edit ".$this->arr_values['page_title'];
        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['submit_url'] = route($this->arr_values['routename'].'update');
        $data['back_btn'] = route($this->arr_values['routename'].'list');
        $data['edit_btn_url'] = route($this->arr_values['routename'].'edit');
        
        $data['keys'] = $this->arr_values['keys'];          
        $data['pagenation'] = array($this->arr_values['title']);
        $data['trash'] = '';

        $row = Transaction::where(["id"=>$id,])->first();
        if(!empty($row))
        {
            $course_category = DB::table("course_category")->where(["status"=>1,])->get();
            return view($this->arr_values['folder_name'].'/form',compact('data','row','course_category'));
        }
        else
        {
            return view('/404',compact('data'));            
        }
    }
    public function view($id='')
    {   
        $id = Crypt::decryptString($id);
        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Edit ".$this->arr_values['page_title'];
        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['submit_url'] = route($this->arr_values['routename'].'update');
        $data['back_btn'] = route($this->arr_values['routename'].'list');
        $data['edit_btn_url'] = route($this->arr_values['routename'].'edit');
        
        $data['keys'] = $this->arr_values['keys'];          
        $data['pagenation'] = array($this->arr_values['title']);
        $data['trash'] = '';

        $row = Transaction::where(["id"=>$id,])->first();
        if(!empty($row))
        {
            $user = DB::table("users")->where(["id"=>$row->user_id,])->orderBy('id','desc')->first();
            return view($this->arr_values['folder_name'].'/view',compact('data','row','user'));
        }
        else
        {
            return view('/404',compact('data'));            
        }
    }

    public function update(Request $request)
    {
        $id = Crypt::decryptString($request->id);
        if(empty($id)) $data = new Transaction;
        else $data = Transaction::find($id);

        $session = Session::get('admin');
        $add_by = $session['id'];

        $status = $request->status;
        $oldStatus = $data->status;
        $data->status = $request->status;



        if($data->save())
        {
            $total_bv = 0;
            $orderProducts = DB::table("order_products")->where("order_id",$data->order_id)->get();
            foreach ($orderProducts as $key => $value)
            {
                $product = DB::table("product")->where("id",$value->product_id)->first();
                if(!empty($product))
                {
                    $total_bv += $product->bv;
                }
            }


            if($status==3 && $oldStatus!=3)
            {
                DB::table("users")->where('id',$data->user_id )->update(["total_bv"=>DB::raw("total_bv + $total_bv"),]);
            }

            else if($status==4 && $oldStatus==3)
            {
                DB::table("users")->where('id',$data->user_id )->update(["total_bv"=>DB::raw("total_bv - $total_bv"),]);
            }


            $action = 'edit';
            // $action = 'redirect';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['action'] = $action;
            $result['url'] = route("order.list");
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }
    }

}