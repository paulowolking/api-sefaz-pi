<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['register' => false, 'verify' => true]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')
    ->middleware('role:admin');

Route::group(['namespace' => 'Web', 'middleware' => 'auth'], function (Router $route) {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'role:admin'], function(Router $route) {

        $route->get('/dashboard', 'DashboardController@index')->name('dashboard');

    });

});
