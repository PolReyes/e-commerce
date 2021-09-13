<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facedes\Auth;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccionController;
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
Route::get("imagenes/{carpeta1}/{carpeta2}/{archivo}",function($carpeta1,$carpeta2,$archivo){
    $path = storage_path("app/".$carpeta1."/".$carpeta2."/".$archivo);
    return response()->file($path);
});

Route::get("/","Frontend\FrontendController@getIndex")->name("front.index");

Route::get('/', function () {
    return view('admin.login');
});

Route::post("accion/login","App\Http\Controllers\AccionController@postLogin")->name("accion.login");

Route::group(['middleware' => ['auth.admin','web']], function () {
    Route::get('/home', function () {
        return view('welcome');
    });
    //Rutas Admin
    Route::resource("productos",ProductoController::class);
    Route::resource("clientes",ClienteController::class);
    Route::resource("usuarios",UserController::class);
    Route::resource("ventas",VentaController::class);

    //Rutas Reporte
    Route::get("reporte/venta","App\Http\Controllers\VentaController@getReporte")->name("reportes.ventas");
    Route::get("reporte/cliente","App\Http\Controllers\ClienteController@getReporte")->name("reportes.clientes");

    Route::get("accion/logout","App\Http\Controllers\AccionController@getLogout")->name("accion.logout");
});

