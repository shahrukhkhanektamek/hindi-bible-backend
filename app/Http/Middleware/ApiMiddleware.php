<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helper\Helpers;
class ApiMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $uri = $request->segment(3);
        $show_case = $request->show_case;
        

        if(!in_array($uri, [
            'login',
            'send-otp',
            'submit-otp',
            'create-password',
            'register-otp-send',
            'register',
            'app-setting',

            'category',
            'sub-category',
            'sub-sub-category',
            'sub-sub-sub-category',
            'post',
        ]) && !empty($uri))
        {         
            $authToken = $request->header('Authorization');
            $user = Helpers::decode_token($authToken);

            if (!$user) {
                return response()->json([
                    "status" => 401,
                    "message" => "Login Again!",
                ], 401);
            }
            $request->merge(['employee_id' => $user->user_id]);
        }

        return $next($request);
    }
}