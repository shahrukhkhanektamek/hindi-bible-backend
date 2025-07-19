<?php

namespace App\Models;



require_once(base_path('')."/libraries/razorpay-php/Razorpay.php");
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

use App\CPU\Helpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class PaymentModel extends Model
{
    const CREATED_AT = 'add_date_time';
    const UPDATED_AT = 'update_date_time';
    protected $table = 'about_logo';
    // protected $casts = [
    //     'parent_id' => 'integer',
    //     'position' => 'integer',
    //     'created_at' => 'datetime',
    //     'updated_at' => 'datetime',
    //     'home_status' => 'integer',
    //     'priority' => 'integer'
    // ];

    /*phonepe start*/

        public static function phonepe_create_url($data)
        {        
            $payment_setting = DB::table("payment_setting")->where('name','PhonePe')->first();
            $key_data = json_decode($payment_setting->data);
            $key = $key_data->key;
            $salt = $key_data->salt;



            $order_amount = $data['amount'];
            $transaction_id = $data['transaction_id'];
            $redirectUrl = $data['redirectUrl'];

                
            $currency = 'INR';
            $data = array (
                  'merchantId' => $key,
                  'merchantTransactionId' => $transaction_id,
                  'order_id' => $transaction_id,
                  'merchantUserId' => "MUID123",
                  'amount' => $order_amount*100,
                  'redirectUrl' => $redirectUrl,
                  'redirectMode' => 'POST',
                  'callbackUrl' => $redirectUrl,
                  'mobileNumber' => '',
                  'paymentInstrument' => 
                  array (
                    'type' => 'PAY_PAGE',
                  ),
            );
            $encode = base64_encode(json_encode($data));
            $saltKey = $salt;
            $saltIndex = 1;
            $string = $encode.'/pg/v1/pay'.$saltKey;
            $sha256 = hash('sha256',$string);
            $finalXHeader = $sha256.'###'.$saltIndex;
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.phonepe.com/apis/hermes/pg/v1/pay',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>json_encode(['request' => $encode]),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'X-VERIFY: '.$finalXHeader
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);
            $url = '';
            if($response->success==true)
            {
                $url = $response->data->instrumentResponse->redirectInfo->url;
            }
            else
            {
                $url = '';
            }
            return $url;        
        }        
        public static function phonepe_payment_status($transaction_id)
        {        

            $payment_setting = DB::table("payment_setting")->where('name','PhonePe')->first();
            $key_data = json_decode($payment_setting->data);
            $key = $key_data->key;
            $salt = $key_data->salt;

            $saltKey = $salt;
            $saltIndex = 1;
            $string = "/pg/v1/status/".$key."/".$transaction_id.$saltKey;
            $sha256 = hash('sha256',$string);
            $finalXHeader = $sha256.'###'.$saltIndex;    
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.phonepe.com/apis/hermes/pg/v1/status/'.$key.'/'.$transaction_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'X-VERIFY: '.$finalXHeader,
                'X-MERCHANT-ID: '.$key
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            return $response = json_decode($response);              
        }

    /*phonepe end*/




    /*payumoney start*/

        public static function payu_create_checksum($data)
        {
            $payment_setting = DB::table("payment_setting")->where('name','Payumoney')->first();
            $key_data = json_decode($payment_setting->data);
            $key = $key_data->key;
            $salt = $key_data->salt;

            $orders = $data['orders'];

            DB::table('transaction')->where('id',$orders->id)->update(["product_name"=>"Consultation Fees",]);
            $orders = DB::table('transaction')->where("id",$orders->id)->where("status",0)->first();


            $MERCHANT_KEY = $key;
            $SALT = $salt;
            $txnid = $data['transaction_id'];
            $PAYU_BASE_URL = 'https://secure.payu.in/';

            $amount = $data['amount'];
            $productinfo = $orders->product_name;
            $firstname = explode(" ",$orders->name)[0];
            $email = $orders->email;
            $phone = $orders->phone;
            $success_url = $data['redirectUrl'];
            $failed_url = $data['redirectFUrl'];
            $cancelled_url = $data['redirectCUrl'];


            $Lastname = '';
            $Zipcode = '';
            $city = '';
            $state = '';
            $country = '';
            $udf1 = '';
            $udf2 = '';
            $udf5 = '';


            $hash=hash('sha512', $MERCHANT_KEY.'|'.$txnid.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|'.$udf1.'|'.$udf2.'|||'.$udf5.'||||||'.$SALT);


            $html = '<form action="'.$PAYU_BASE_URL.'/_payment" id="payment_form_submit" method="post">
              <input type="hidden" id="udf5" name="udf5" value="'.$udf5.'" />
               <input type="hidden" id="udf1" name="udf1" value="'.$udf1.'" />
               <input type="hidden" id="udf1" name="udf2" value="'.$udf2.'" />
              <input type="hidden" id="surl" name="surl" value="'.$success_url.'" />
              <input type="hidden" id="furl" name="furl" value="'.$failed_url.'" />
              <input type="hidden" id="curl" name="curl" value="'.$cancelled_url.'" />
              <input type="hidden" id="key" name="key" value="'.$MERCHANT_KEY.'" />
              <input type="hidden" id="txnid" name="txnid" value="'.$txnid.'" />
              <input type="hidden" id="amount" name="amount" value="'.$amount.'" />

              <input type="hidden" id="productinfo" name="productinfo" value="'.$productinfo.'" />
              <input type="hidden" id="firstname" name="firstname" value="'.$firstname.'" />
              <input type="hidden" id="Lastname" name="Lastname" value="'.$Lastname.'" />
              <input type="hidden" id="Zipcode" name="Zipcode" value="'.$Zipcode.'" />
              <input type="hidden" id="email" name="email" value="'.$email.'" />
              <input type="hidden" id="phone" name="phone" value="'.$phone.'" />
              <input type="hidden" id="address1" name="address1" value="" />
              <input type="hidden" id="address2" name="address2" value="" />
              <input type="hidden" id="city" name="city" value="'.$city.'" />
              <input type="hidden" id="state" name="state" value="'.$state.'" />
              <input type="hidden" id="country" name="country" value="'.$country.'" />
              <input type="hidden" id="Pg" name="Pg" value="Pay" />
              <input type="hidden" id="hash" name="hash" value="'.$hash.'" />
              </form>
              <script type="text/javascript">
                document.getElementById("payment_form_submit").submit();
              </script>';


            return $html;
        }        
        public static function payu_payment_status($transaction_id)
        {

            $payment_setting = DB::table("payment_setting")->where('name','Payumoney')->first();
            $key_data = json_decode($payment_setting->data);
            $key = $key_data->key;
            $salt = $key_data->salt;


            $hash = hash('sha512',$key.'|verify_payment'.'|'.$transaction_id.'|'.$salt);
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://info.payu.in/merchant/postservice?form=2',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS => array('key' => $key,'command' => 'verify_payment','hash' => $hash,'var1' => $transaction_id),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            return $response = json_decode((($response)));
        }

    /*payumoney end*/




    /*Razorpay start*/

        public static function razorpay_create_checksum($data)
        {        
            $payment_setting = DB::table("payment_setting")->where('name','Razorpay')->first();
            $key_data = json_decode($payment_setting->data);
            $key = $key_data->key;
            $salt = $key_data->salt;
            $orders = $data['orders'];            
            $amount = $orders->final_amount;
            $productinfo = $orders->product_name;
            $api = new Api($key, $salt);
            $razorpayOrder = $api->order->create(array(
                'receipt'         => rand(),
                'amount'          => $amount * 100, // 2000 rupees in paise
                'currency'        => 'INR',
                'payment_capture' => 1 // auto capture
            ));
            $amount = $razorpayOrder['amount'];
            $razorpayOrderId = $razorpayOrder['id'];
            $dataData = array(
                  "key" => $key,
                  "amount" => $amount,
                  "name" => env('APP_NAME'),
                  "description" => env('APP_NAME'),
                  "image" => '',
                  "prefill" => array(
                    "name"  => $orders->name,
                    "email"  => $orders->email,
                    "contact" => $orders->phone,
                  ),
                  "notes"  => array(
                    "address"  => "Hello World",
                    "merchant_order_id" => rand(),
                  ),
                  "theme"  => array(
                    "color"  => "#F37254"
                  ),
                  "order_id" => $razorpayOrderId,
                );
                $View = '
                    <button id="rzp-button1" style="display:none;">Pay with Razorpay</button>
                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
                    <form name="razorpayform" action="'.$data['redirectUrl'].'" method="POST">
                        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                        <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
                    </form>
                    <script>
                    var options = '.json_encode($dataData).';
                    options.handler = function (response){
                        document.getElementById("razorpay_payment_id").value = response.razorpay_payment_id;
                        document.getElementById("razorpay_signature").value = response.razorpay_signature;
                        document.razorpayform.submit();
                    };
                    options.theme.image_padding = false;
                    options.modal = {
                        ondismiss: function() {
                            console.log("This code runs when the popup is closed");
                        },
                        escape: true,
                        backdropclose: false
                    };
                    var rzp = new Razorpay(options);
                    $(document).ready(function(){
                      $("#rzp-button1").click();
                       rzp.open();
                        e.preventDefault();
                    });
                    </script>
                ';
                return ["transaction_id"=>$razorpayOrderId,"html"=>$View,];

        }        
        public static function razorpay_payment_status($transaction_id)
        {
            $payment_setting = DB::table("payment_setting")->where('name','Razorpay')->first();
            $key_data = json_decode($payment_setting->data);
            $api_key = $key_data->key;
            $api_secret = $key_data->salt;
            $orders = DB::table('transaction')->where("transaction_id",$transaction_id)->where("status",0)->first();
            if(!empty($orders))
            {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/payments/" . $transaction_id);
                // curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/orders/" . $transaction_id);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_USERPWD, $api_key . ":" . $api_secret);
                $response = curl_exec($ch);
                curl_close($ch);
                $payment_details = json_decode($response, true);
                return $payment_details;
            }
            return [];
        }

    /*Razorpay end*/










    
}
