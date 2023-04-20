<?php

use App\Http\Controllers\api\Pages;
use App\Http\Controllers\api\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1.0')->group(function () {
    // SITE DATA
    Route::get('/home-page', [Pages::class, 'homepage']);
    Route::middleware('checkPost')->group(function (){
        Route::any('/faq', [Pages::class, 'getFaq']);
        Route::any('/blog', [Pages::class, 'getBlog']);
        Route::any('/single-blog', [Pages::class, 'singleBlog']);
        Route::any('/tncPrivacy', [Pages::class, 'terms_and_privacy']);
        Route::any('/contact-us', [Pages::class, 'contact']);
        Route::any('/about-us', [Pages::class, 'about']);
    });
    Route::middleware("auth:sanctum")->group(function () {
        Route::get('/logout', [User::class, 'logout']);
    });

    Route::post('signup', [User::class, 'signup_user']);
    Route::post('verify-user', [User::class, 'verify_signup_key']);
    Route::post('resend-otp', [User::class, 'otp_resend']);
});
