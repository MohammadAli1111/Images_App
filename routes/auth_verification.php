<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Controller;
use \App\Http\Controllers\Auth\ResetPasswordController ;
use \App\Http\Controllers\Auth\ForgotPasswordController ;
use \App\Http\Controllers\Auth\VerificationController ;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {


   Auth::routes(['verify'=>true]);





    #### forgot-password ####
    Route::get('/forgot-password', [ForgotPasswordController::class,'getForgotPassword'])
        ->middleware('guest')->name('password.request');

    Route::post('/forgot-password', [ForgotPasswordController::class,'postForgotPassword'])
        ->middleware('guest')->name('password.email');
    #### End forgot-password ####


    ### Reset Password ########
    Route::get('/reset-password/{token}', [ResetPasswordController::class,'reset'])
        ->middleware('guest')->name('password.reset');

    Route::post('/reset-password', [ResetPasswordController::class,'update'])
        ->middleware('guest')->name('password.update');
    #######End Reset Password  #################


    ### verification  ###########
    Route::get('/email/verify',[VerificationController::class,'notice'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}',[VerificationController::class,'verification_verify'])
        ->name('verification.verify');

    Route::post('/email/verification-notification',[VerificationController::class,'verification_send'])
        ->name('verification.send');
    ### End verification  ###########
});



