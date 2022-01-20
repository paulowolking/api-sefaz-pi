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

Route::get('logout', function () {
    \Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')
    ->middleware('role:admin');

Route::group(['namespace' => 'Web', 'middleware' => 'auth'], function (Router $route) {

    Route::group(['namespace' => 'Admin', 'middleware' => 'role:admin'], function (Router $route) {

        $route->get('/dashboard', 'DashboardController@index')->name('dashboard');
        $route->resource('/usuarios', 'UsuarioController');
        $route->get('/perfil/', 'MinhaContaController@editar')->name('perfil.editar');
        $route->post('/perfil/atualizar', 'MinhaContaController@atualizar')->name('perfil.atualizar');
        $route->post('/cliente', 'DashboardController@cliente')->name('dashboard.cliente');
        $route->post('/pagamento', 'DashboardController@pagamento')->name('dashboard.pagamento');
        $route->post('/user-sefaz', 'DashboardController@userSefaz')->name('dashboard.user.sefaz');
    });

});
