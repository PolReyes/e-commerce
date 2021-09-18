<?php

namespace App\Http\Controllers\Frontend;

use App\Cliente;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Venta;
use App\VentaDetalle;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AccionController extends Controller
{
    public function agregarCarrito(Request $request){

        $producto = Producto::find($request->producto_id);

        if(CartFacade::get($request->producto_id) != null){
            CartFacade::update($request->producto_id,array(
                'quantity' => $request->cantidad,
            ));
        }else{
            CartFacade::add(array(
                "id" => $producto->id,
                "name" => $producto->nombre,
                "price" => $producto->precio,
                "quantity" => $request->cantidad,
                "attributes" => array(),
                "associatedModel" => $producto,
            ));
        }

        return redirect()->back();

    }

    public function actualizarCantidad(Request $request){
        CartFacade::update($request->producto_id,array(
            "quantity" => array(
                "relative" => false,
                "value" => $request->cantidad,
            ),
        ));

        return redirect()->back();
    }

    public function eliminarCarrito(Request $request){
        CartFacade::remove($request->producto_id);

        return redirect()->back();
    }

    public function postRegistro(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:clientes',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $cliente = new Cliente();
        $cliente->email = $request->input("email");
        $cliente->password = Hash::make($request->input("password"));
        $cliente->nombre = $request->input("nombre");
        $cliente->apellido = $request->input("apellido");
        $cliente->telefono = $request->input("telefono");
        $cliente->direccion = $request->input("direccion");

        if($cliente->save()){
            Auth::guard('client')->attempt(["email" => $cliente->email, "password" => $request->input("password")]);
            Session::put("proceso",2);

            return redirect()->back();
        }

        return redirect()->back()->withErrors([
            "error" => "No hemos podido registrar tu cuenta, verifica tus datos"
        ]);
    }

    public function postLogin(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        if(Auth::guard('client')->attempt(["email" => $request->input("email"), "password" => $request->input("password")])){
            Session::put("proceso",2);
            return redirect()->back();
        }

        return redirect()->back()->withErrors([
            "error" => "No hemos podido registrar tu cuenta, verifica tus datos"
        ]);
    }

    public function postMetodoPago(Request $request){

        $validator = Validator::make($request->all(), [
            'metodo' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        Session::put("proceso",3);
        Session::put("metodo_pago",$request->input("metodo"));
        return redirect()->back();

    }

    public function postFinalizarCompra(Request $request){

        $venta = new Venta();
        $venta->cliente_id = Auth::guard('client')->user()->id;
        $venta->monto = CartFacade::getTotal();
        $venta->direccion = Auth::guard('client')->user()->direccion;
        $venta->estado = "Pago pendiente";

        if($venta->save()){
            foreach (CartFacade::getContent() as $item) {

                $ventadetalle = new VentaDetalle();
                $ventadetalle->venta_id = $venta->id;
                $ventadetalle->producto_id = $item->id;
                $ventadetalle->cantidad = $item->quantity;
                $ventadetalle->precio = $item->price * $item->quantity;
                $ventadetalle->save();

            }

            CartFacade::clear();
            Session::forget("proceso");
            Session::forget("metodo_pago");

            return redirect()->route("front.compra.exitosa",[$venta->id]);
        }

        return redirect()->back()->withErrors([
            "error" => "No se completo tu compra, comunicate con un asistente de ventas si el error persiste"
        ]);

    }

    public function getVolver(){
        Session::put("proceso",2);
        return redirect()->back();
    }

    public function getLogout(){
        Auth::guard('client')->logout();
        Session::forget("proceso");
        return redirect()->intended('/');
    }
}
