<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*common api start*/
use App\Http\Controllers\Api\CommonController;
/*common api end*/



/*User start*/

use App\Http\Controllers\Api\User\UserAuthController;
use App\Http\Controllers\Api\User\UserHomeController;
use App\Http\Controllers\Api\User\UserProfileController;


use App\Http\Controllers\Api\User\UserCategoriesController;


use App\Http\Controllers\Api\User\UserPostController;
use App\Http\Controllers\Api\User\UserNewsController;
use App\Http\Controllers\Api\User\UserController;

use App\Http\Controllers\Api\User\UserCartController;

/*User end*/






/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


/*Common apis start*/
    Route::get('country', [CommonController::class, 'country']);
    Route::get('package', [CommonController::class, 'package']);
    Route::get('state', [CommonController::class, 'state']);
    Route::get('app-setting', [CommonController::class, 'app_setting']);
    Route::get('app-visit', [CommonController::class, 'appVisit']);
    Route::POST('contact-inquiry', [CommonController::class, 'contactInquiry']);
/*Common apis end*/


/*User apis start*/

Route::group(['prefix'=>'user','as'=>'user.', 'namespace'=>'User'], function(){
    Route::post('login', [UserAuthController::class, 'login']);

    Route::post('register-otp-send', [UserAuthController::class, 'register_otp_send']);
    Route::post('register', [UserAuthController::class, 'register']);

    Route::post('send-otp', [UserAuthController::class, 'send_otp']);
    Route::post('submit-otp', [UserAuthController::class, 'submit_otp']);
    Route::post('create-password', [UserAuthController::class, 'create_password']);

    Route::get('logout', [UserController::class, 'logout']);


    Route::group(['prefix'=>'news', 'as'=>'news.'], function(){

        Route::get('list', [UserNewsController::class, 'list']);
    });



    Route::group(['middleware' => ['api']], function () {

        Route::get('home-detail', [UserHomeController::class, 'detail']);


        Route::post('update-profile', [UserProfileController::class, 'update_profile']);
        Route::post('update-profile-photo', [UserProfileController::class, 'update_profile_photo']);
        Route::post('update-password', [UserProfileController::class, 'update_password']);
        Route::get('get-profile', [UserProfileController::class, 'get_profile']);
        Route::post('logout', [UserAuthController::class, 'logout']);


        Route::get('profile', [UserController::class, 'detail']);

        Route::get('category', [UserCategoriesController::class, 'category']);
        Route::get('sub-category', [UserCategoriesController::class, 'sub_category']);
        Route::get('sub-sub-category', [UserCategoriesController::class, 'sub_sub_category']);
        Route::get('sub-sub-sub-category', [UserCategoriesController::class, 'sub_sub_sub_category']);

        Route::group(['prefix'=>'post', 'as'=>'post.'], function(){

            Route::get('list', [UserPostController::class, 'list']);
        });        



    });


});

/*User apis end*/


