<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
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

Route::get('/', function () {
    return view('welcome');
});

//Rutas Admin
Route::resource("productos",ProductoController::class);
Route::resource("clientes",ClienteController::class);
Route::resource("ventas",VentaController::class);

//Rutas Reporte
Route::get("reporte/venta","App\Http\Controllers\VentaController@getReporte")->name("reportes.ventas");
Route::get("reporte/cliente","App\Http\Controllers\ClienteController@getReporte")->name("reportes.clientes");