<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
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



Route::group(['namespace' => 'Api', 'middleware' => 'api'], function (Router $route) {

    $route->post('user', 'UserController@store');

    $route->get('email/verify/{id}/{hash}', 'VerificationController@verify')->name('api.verification.verify');
    $route->get('email/resend', 'VerificationController@resend')->name('api.verification.resend');

    Route::group(['middleware' => 'auth:api'], function (Router $route) {

        Route::group(['prefix' => 'user'], function (Router $route) {

            $route->get('/', 'UserController@me');
            $route->get('/{userId}', 'UserController@show');
            $route->put('', 'UserController@update');
            $route->post('/fcm-token', 'UserController@fcmTokenRegister');
        });
    });

    Route::group(['prefix' => 'password'], function (Router $route) {

        $route->post('create', 'ResetPasswordController@create');
        $route->get('find/{token}', 'ResetPasswordController@find');
        $route->post('reset', 'ResetPasswordController@reset');
    });

});

