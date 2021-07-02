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



    Route::get('/',[Controller::class,'index'])->name("index");
    Route::get('/like/{id}',[Controller::class,'Like'])->name("like");
    Route::get('/dislike/{id}',[Controller::class,'disLike'])->name("dislike");
    Route::get('/download/{id}',[Controller::class,'downloadFromIndex'])->name("index.download");

    Route::group(['prefix' => '/', 'middleware' => ['auth','verified']], function () {

        Route::get('Home', [Controller::class, 'home'])->name("home");

        Route::get('addImage', [Controller::class, 'getAddImage'])->name("getAddImage");
        Route::get('updateImage', [Controller::class, 'getupdateImage'])->name("getupdateImage");
        Route::get('delete/{id}', [Controller::class, 'delete'])->name("delete");
        Route::get('Home/download/{id}', [Controller::class, 'downloadFromHome'])->name("home.download");

        Route::post('addImage', [Controller::class, 'postAddImage'])->name("postAddImage");
        Route::post('updateImage/{id}', [Controller::class, 'postupdateImage'])->name("postupdateImage");

    });


});



