<?php

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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get("imagenes/{carpeta1}/{carpeta2}/{archivo}",function($carpeta1,$carpeta2,$archivo){
    $path = storage_path("app/".$carpeta1."/".$carpeta2."/".$archivo);
    return response()->file($path);
});

// Rutas del carrito de compras
Route::get("/",'Frontend\FrontendController@getIndex')->name("front.index");
Route::get("/producto/{id}",'Frontend\FrontendController@getProducto')->name("front.producto");
Route::get("/tienda",'Frontend\FrontendController@getTienda')->name("front.tienda");

Route::get("/proceso/carrito",'Frontend\FrontendController@getCarrito')->name("front.carrito");
Route::get("/proceso/compra",'Frontend\FrontendController@getCompra')->name("front.compra");

Route::post("/accion/agregar_carrito",'Frontend\AccionController@agregarCarrito')->name("accion.agregar_carrito");
Route::get("/accion/actualizar_cantidad",'Frontend\AccionController@actualizarCantidad')->name("accion.actualizar_carrito");
Route::get("/accion/eliminar_carrito",'Frontend\AccionController@eliminarCarrito')->name("accion.eliminar_carrito");

Route::post("/accion/metodo_pago",'Frontend\AccionController@postMetodoPago')->name("accion.metodo_pago");
Route::post("/accion/finalizar_compra",'Frontend\AccionController@postFinalizarCompra')->name("accion.finalizar_compra");
Route::get("/accion/volver",'Frontend\AccionController@getVolver')->name("accion.volver");
Route::get("/proceso/compra/exitosa/{id_orden}",'Frontend\FrontendController@getCompraExitosa')->name("front.compra.exitosa");

Route::post("/accion/registro",'Frontend\AccionController@postRegistro')->name("accion.registro");
Route::post("/accion/login",'Frontend\AccionController@postLogin')->name("accion.login_web");
Route::get("/accion/logout","Frontend\AccionController@getLogout")->name("accion.logout_web");

// Rutas de administración

Route::group(['middleware' => ['web'],"prefix" => "admin"], function () {
    Route::get('/', function () {
        if(Auth::check()){
            return redirect()->route("admin.home");
        }
        return view('admin.login');
    })->name("admin.login");

    Route::post("accion/login","AccionController@postLogin")->name("accion.login");

    Route::group(['middleware' => ['auth.admin']], function () {
        Route::get('/home', function () {
            return view('welcome');
        })->name("admin.home");

        // Rutas de administración
        Route::resource("productos","ProductoController");
        Route::resource("categorias","CategoriaController");
        Route::resource("clientes","ClienteController");
        Route::resource("usuarios","UserController");
        Route::resource("ventas","VentaController");

        //Rutas de reporte
        Route::get("reporte/venta","VentaController@getReporte")->name("reportes.ventas");
        Route::get("reporte/cliente","ClienteController@getReporte")->name("reportes.clientes");
        Route::get("accion/logout","AccionController@getLogout")->name("accion.logout");

    });
});
