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
use App\Models\IntroVideo;
 
class IntroVideoController extends Controller
{
     protected $arr_values = array(
        'routename'=>'intro-video.', 
        'title'=>'Intro Video', 
        'table_name'=>'category',
        'page_title'=>'Intro Video',
        "folder_name"=>'/intro-video',
        "upload_path"=>'upload/',
        "page_name"=>'intro-video-detail.blade.php',
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
        $id = 1;
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

        $row = IntroVideo::where(["id"=>$id,])->first();
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
        if(empty($id)) $data = new IntroVideo;
        else $data = IntroVideo::find($id);

        $session = Session::get('admin');
        $add_by = $session['id'];
        
        

        $video_type = $request->type;
        $video = $request->video;
        $data->type = $request->type;
        $data->name = $request->name;
        $data->status = $request->status;
        

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
   

}