<?php 

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Payment\RazorpayController;
use App\Http\Controllers\Payment\PhonepeController;
use App\Http\Controllers\Payment\PayumoneyController;





Route::get('create-transaction', [PaymentController::class, 'create_transaction'])->name('create-transaction');
Route::get('pay', [PaymentController::class, 'pay'])->name('pay');
Route::group(['prefix'=>'payumoney', 'as'=>'payumoney.', 'namespace'=>'User'], function(){
    Route::get('make-payment', [PayumoneyController::class, 'make_payment'])->name('make-payment');
    Route::post('payment-response', [PayumoneyController::class, 'payment_response'])->name('payment-response');
    Route::get('payment-status', [PayumoneyController::class, 'payment_status'])->name('payment-status');
    Route::get('payment-response-testing', [PayumoneyController::class, 'payment_response_testing'])->name('payment-response-testing');
});


Route::group(['prefix'=>'phonepe', 'as'=>'phonepe.', 'namespace'=>'User'], function(){
    Route::get('make-payment', [PhonepeController::class, 'make_payment'])->name('make-payment');
    Route::post('payment-response', [PhonepeController::class, 'payment_response'])->name('payment-response');
    Route::get('payment-status', [PhonepeController::class, 'payment_status'])->name('payment-status');
    Route::get('payment-response-testing', [PhonepeController::class, 'payment_response_testing'])->name('payment-response-testing');
});

Route::group(['prefix'=>'razorpay', 'as'=>'razorpay.', 'namespace'=>'User'], function(){
    Route::get('make-payment', [RazorpayController::class, 'make_payment'])->name('make-payment');
    Route::post('payment-response', [RazorpayController::class, 'payment_response'])->name('payment-response');
    Route::post('payment-verify', [RazorpayController::class, 'payment_verify'])->name('payment-verify');
    Route::get('payment-status', [RazorpayController::class, 'payment_status'])->name('payment-status');
    Route::get('payment-response-testing', [RazorpayController::class, 'payment_response_testing'])->name('payment-response-testing');
});

Route::get('/payment-block', [PaymentController::class, 'payment_block']);
Route::get('/payment-faild', [PaymentController::class, 'payment_faild']);
Route::get('/payment-success', [PaymentController::class, 'payment_success']);

