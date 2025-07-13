<?php
namespace App\Http\Controllers\APi\User;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use App\Helper\Helpers;
use App\Models\MemberModel;

class UserCategoriesController extends Controller
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

    public function category(Request $request)
    {
        $table_name = 'category';
        $data_list = DB::table($table_name)
        ->where($table_name.'.status', 1)
        ->leftJoin('sub_category as sub_category', 'sub_category.category_id', '=', $table_name.'.id')
        ->leftJoin('sub_sub_category as sub_sub_category', 'sub_sub_category.category_id', '=', $table_name.'.id')
        ->leftJoin('sub_sub_sub_category as sub_sub_sub_category', 'sub_sub_sub_category.category_id', '=', $table_name.'.id')
        ->leftJoin('post as post', 'post.category_id', '=', $table_name.'.id')
        ->select(
            $table_name.'.id',
            $table_name.'.name',
            $table_name.'.font_size',
            $table_name.'.description',
            $table_name.'.image',
            DB::raw('IF(sub_category.id IS NOT NULL, 1, 0) as sub_category_used'),
            DB::raw('IF(sub_sub_category.id IS NOT NULL, 1, 0) as sub_sub_category_used'),
            DB::raw('IF(sub_sub_sub_category.id IS NOT NULL, 1, 0) as sub_sub_sub_category_used'),
            DB::raw('IF(post.id IS NOT NULL, 1, 0) as post_used'),
            "post.post_type as post_type"
        )
        ->groupBy(
            $table_name.'.id',
            $table_name.'.name',
            $table_name.'.font_size',
            $table_name.'.description',
            $table_name.'.image'
        )
        ->orderBy($table_name.'.id', 'asc')
        ->limit(100)
        ->get();


        $data_list->transform(function ($item) {

            $item->image = url('storage/app/public/upload/'.$item->image);

            return $item;
        });

        
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'return';
        $result['data'] = $data_list;

        return response()->json($result, $responseCode);
    }

    public function sub_category(Request $request)
    {
        $id = $request->id;
        $table_name = 'sub_category';
        $data_list = DB::table($table_name)
        ->where($table_name.'.status', 1)
        ->where($table_name.'.category_id', $id)
        ->leftJoin('sub_sub_category as sub_sub_category', 'sub_sub_category.sub_category_id', '=', $table_name.'.id')
        ->leftJoin('sub_sub_sub_category as sub_sub_sub_category', 'sub_sub_sub_category.sub_category_id', '=', $table_name.'.id')
        ->leftJoin('post as post', 'post.sub_category_id', '=', $table_name.'.id')
        ->select(
            $table_name.'.id',
            $table_name.'.name',
            $table_name.'.font_size',
            $table_name.'.description',
            $table_name.'.image',
            DB::raw('IF(sub_sub_category.id IS NOT NULL, 1, 0) as sub_sub_category_used'),
            DB::raw('IF(sub_sub_sub_category.id IS NOT NULL, 1, 0) as sub_sub_sub_category_used'),
            DB::raw('IF(post.id IS NOT NULL, 1, 0) as post_used')
        )
        ->groupBy(
            $table_name.'.id',
            $table_name.'.name',
            $table_name.'.font_size',
            $table_name.'.description',
            $table_name.'.image'
        )
        ->orderBy($table_name.'.id', 'asc')
        ->limit(100)
        ->get();


        $data_list->transform(function ($item) {

            $item->image = url('storage/app/public/upload/'.$item->image);

            return $item;
        });

        
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'return';
        $result['data'] = $data_list;

        return response()->json($result, $responseCode);
    }
    public function sub_sub_category(Request $request)
    {
        $id = $request->id;
        $table_name = 'sub_sub_category';
        $data_list = DB::table($table_name)
        ->where($table_name.'.status', 1)
        ->where($table_name.'.sub_category_id', $id)
        ->leftJoin('sub_sub_sub_category as sub_sub_sub_category', 'sub_sub_sub_category.sub_sub_category_id', '=', $table_name.'.id')
        ->leftJoin('post as post', 'post.sub_sub_category_id', '=', $table_name.'.id')
        ->select(
            $table_name.'.id',
            $table_name.'.name',
            $table_name.'.font_size',
            $table_name.'.description',
            $table_name.'.image',
            DB::raw('IF(sub_sub_sub_category.id IS NOT NULL, 1, 0) as sub_sub_sub_category_used'),
            DB::raw('IF(post.id IS NOT NULL, 1, 0) as post_used')
        )
        ->groupBy(
            $table_name.'.id',
            $table_name.'.name',
            $table_name.'.font_size',
            $table_name.'.description',
            $table_name.'.image'
        )
        ->orderBy($table_name.'.id', 'asc')
        ->limit(100)
        ->get();


        $data_list->transform(function ($item) {

            $item->image = url('storage/app/public/upload/'.$item->image);

            return $item;
        });

        
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'return';
        $result['data'] = $data_list;

        return response()->json($result, $responseCode);
    }
    public function sub_sub_sub_category(Request $request)
    {
        $id = $request->id;
        $table_name = 'sub_sub_sub_category';
        $data_list = DB::table($table_name)
        ->where($table_name.'.status', 1)
        ->where($table_name.'.sub_sub_category_id', $id)
        ->leftJoin('post as post', 'post.sub_sub_sub_category_id', '=', $table_name.'.id')
        ->select(
            $table_name.'.id',
            $table_name.'.name',
            $table_name.'.font_size',
            $table_name.'.description',
            $table_name.'.image',
            DB::raw('IF(post.id IS NOT NULL, 1, 0) as post_used')
        )
        ->groupBy(
            $table_name.'.id',
            $table_name.'.name',
            $table_name.'.font_size',
            $table_name.'.description',
            $table_name.'.image'
        )
        ->orderBy($table_name.'.id', 'asc')
        ->limit(100)
        ->get();


        $data_list->transform(function ($item) {

            $item->image = url('storage/app/public/upload/'.$item->image);

            return $item;
        });

        
        $responseCode = 200;
        $result['status'] = $responseCode;
        $result['message'] = 'Success';
        $result['action'] = 'return';
        $result['data'] = $data_list;

        return response()->json($result, $responseCode);
    }
    
    
}