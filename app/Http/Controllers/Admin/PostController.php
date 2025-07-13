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
use App\Models\Post;
 
class PostController extends Controller
{
     protected $arr_values = array(
        'routename'=>'post.', 
        'title'=>'Post', 
        'table_name'=>'post',
        'page_title'=>'Post',
        "folder_name"=>'/post',
        "upload_path"=>'upload/',
        "page_name"=>'post-detail.blade.php',
        "keys"=>'id,name',
        "all_image_column_names"=>array("image"),
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
        $data['add_btn_url'] = route($this->arr_values['routename'].'add');
        $data['edit_btn_url'] = route($this->arr_values['routename'].'edit');
        $data['delete_btn_url'] = route($this->arr_values['routename'].'delete');
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
      $order_by = "desc";
      $is_delete = 0;
      

      if(!empty($request->limit)) $limit = $request->limit;
      if($request->status==0) $status = $request->status;
      if(!empty($request->order_by)) $order_by = $request->order_by;
      if(!empty($request->filter_search_value)) $filter_search_value = $request->filter_search_value;

      // echo $status;

        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['back_btn'] = route($this->arr_values['routename'].'list');
        $data['add_btn_url'] = route($this->arr_values['routename'].'add');
        $data['edit_btn_url'] = route($this->arr_values['routename'].'edit');
        $data['delete_btn_url'] = route($this->arr_values['routename'].'delete');



      $data_list = Post::where([$this->arr_values['table_name'].'.status' => $status])->orderBy('id',$order_by)
      ->leftJoin('category as category', 'category.id', '=', $this->arr_values['table_name'] . '.category_id')
        ->leftJoin('sub_category as sub_category', 'sub_category.id', '=', $this->arr_values['table_name'] . '.sub_category_id')
        ->leftJoin('sub_sub_category as sub_sub_category', 'sub_sub_category.id', '=', $this->arr_values['table_name'] . '.sub_sub_category_id')
        ->leftJoin('sub_sub_sub_category as sub_sub_sub_category', 'sub_sub_sub_category.id', '=', $this->arr_values['table_name'] . '.sub_sub_sub_category_id')
        ->select($this->arr_values['table_name'] . '.*','category.name as category_name','sub_category.name as sub_category_name','sub_sub_category.name as sub_sub_category_name','sub_sub_sub_category.name as sub_sub_sub_category_name');
      
      if(!empty($filter_search_value))
      {
        $filter_search_value = explode(" ", $filter_search_value);
        foreach ($filter_search_value as $key => $value)
        {
            $data_list = $data_list->where($this->arr_values['table_name'].'.name','LIKE',"%{$value}%");            
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
    public function add()
    {
        $data['title'] = "".$this->arr_values['title'];
        $data['page_title'] = "Add ".$this->arr_values['page_title'];
        $data['table_name'] = $this->arr_values['table_name'];
        $data['upload_path'] = $this->arr_values['upload_path'];
        $data['submit_url'] = route($this->arr_values['routename'].'update');
        $data['back_btn'] = route($this->arr_values['routename'].'list');
        $data['add_btn_url'] = route($this->arr_values['routename'].'add');
        $data['edit_btn_url'] = route($this->arr_values['routename'].'edit');
        $data['delete_btn_url'] = route($this->arr_values['routename'].'delete');
        $data['keys'] = $this->arr_values['keys'];          
        $data['pagenation'] = array($this->arr_values['title']);
        $data['trash'] = '';
        $row = [];
        return view($this->arr_values['folder_name'].'/form',compact('data','row'));
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
        $data['add_btn_url'] = route($this->arr_values['routename'].'add');
        $data['edit_btn_url'] = route($this->arr_values['routename'].'edit');
        $data['delete_btn_url'] = route($this->arr_values['routename'].'delete');
        $data['keys'] = $this->arr_values['keys'];          
        $data['pagenation'] = array($this->arr_values['title']);
        $data['trash'] = '';

        $row = Post::where(["id"=>$id,])->first();
        if(!empty($row))
        {
            return view($this->arr_values['folder_name'].'/form',compact('data','row'));
        }
        else
        {
            return view('/404',compact('data'));            
        }
    }

    public function update(Request $request)
    {
        $id = Crypt::decryptString($request->id);
        if(empty($id)) $data = new Post;
        else $data = Post::find($id);

        $session = Session::get('admin');
        $add_by = $session['id'];
        
        

        
        $data->video_type = $request->video_type;
        $data->post_type = $request->post_type;
        $data->name = $request->name;
        $data->category_id = $request->category_id;
        $data->sub_category_id = $request->sub_category_id;
        $data->sub_sub_category_id = $request->sub_sub_category_id;
        $data->sub_sub_sub_category_id = $request->sub_sub_sub_category_id;
        $data->description = $request->description;
        $data->full_description = $request->full_description;
        $data->status = $request->status;

        $video_type = $request->video_type;
        $video = $request->video;
        

        if(empty($id))
        {   
            $data->image = ImageManager::upload($this->arr_values['upload_path'], 'png', $request->file('image'));
        }
        else
        {
            if ($request->image) $data->image = ImageManager::update($this->arr_values['upload_path'], $data->image, 'png', $request->file('image'));
        }

        if($video_type==1)
        {
            if(empty($id))
            {
                $data->video = ImageManager::video_upload($this->arr_values['upload_path'], 'png', $request->file('video'));
            }
            else
            {
                if ($request->video) $data->video = ImageManager::video_update($this->arr_values['upload_path'], $data->video, 'png', $request->file('video'));
            }
        }
        if($video_type==2)
        {
            $data->video = $video;
        }
        if($video_type==3)
        {
            if(isset(explode("be/", $video)[1]))
                $video = explode("be/", $video)[1];
            else if(isset(explode("embed/", $video)[1]))
                $video = explode('" title', explode("embed/", $video)[1])[0];
            else if(isset(explode("?v=", $video)[1]))
                $video = explode("?si", explode("&", explode("?v=", $video)[1])[0])[0];
            else
                $video = $video;
            $video = $video = explode("?si", $video)[0];
            $data->video = $video;
        }
        else if($video_type==4)
        {
            $data->video = $video;
            $ch = curl_init("https://api.gumlet.com/v1/video/assets/".$video);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: Bearer ' . env("gumlet_api_key")
            ]);
            curl_setopt($ch, CURLOPT_POST, false);
            $response = curl_exec($ch);
            if ($response === false) {
                echo 'Error: ' . curl_error($ch);
            } else {
                // echo 'Response: ' . $response . "\n";

                $response = json_decode($response);
                DB::table('course_video')->where('id',$data->id)->update(["image"=>$response->output->thumbnail_url[0],]);
            }
            curl_close($ch);
        }



        $data->add_by = $add_by;
        $data->is_delete = 0;
        if($data->save())
        {
            $name = $data->name;
            if(empty($request->slug)) $slug = Helpers::slug($name);
            else $slug = Helpers::slug($request->slug);
            $p_id = $data->id;
            $table_name = $this->arr_values['table_name'];
            $new_slug = Helpers::insert_slug($slug,$p_id,$table_name,$this->arr_values['page_name']);


            $action = 'add';
            if(!empty($id)) $action = 'edit';
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Success';
            $result['action'] = $action;
            $result['data'] = [];
            return response()->json($result, $responseCode);
        }

    }
    public function delete(Request $request, $id)
    {
        $id = Crypt::decryptString($request->id);
        $data = Post::find($id);
        if($data->delete())
        {
            $responseCode = 200;
            $result['status'] = $responseCode;
            $result['message'] = 'Delete Successfuly';
            $result['action'] = 'delete';
            $result['data'] = [];            
        }
        else
        {
            $responseCode = 400;
            $result['status'] = $responseCode;
            $result['message'] = 'Delete Not Successfuly';
            $result['action'] = 'delete';
            $result['data'] = [];            
        }
        return response()->json($result, $responseCode);
    }

}