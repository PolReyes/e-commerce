<?php

namespace App\Http\Controllers\Frontend;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function getIndex(){
        $data["categorias"] = Categoria::where("nombre","<>","")->take(3)->get();
        $data["productos"] = Producto::orderByRaw("RAND()")->take(12)->get();
        $data["producto"] = Producto::find(1);
        return view("frontend.home.index")->with($data);
    }

    public function getProducto($id){

        $data["producto"] = Producto::find($id);
        $data["relacionados"] = Producto::where("categoria_id",$data["producto"]->categoria_id)
                                            ->where("id","<>",$data["producto"]->id)
                                            ->orderByRaw("RAND()")
                                            ->take(6)
                                            ->get();
        if($data["producto"]){
            return view("frontend.producto.detalle")->with($data);
        }
        return redirect()->route("front.index");
    }

    public function getTienda(Request $request){
        $data["categorias"] = Categoria::where("nombre","<>","")->get();
        $data["productos"] = null;

        $productos = Producto::where("created_at","<>",null);

        if($request->has("categoria_id")){
            $productos->whereIn("categoria_id",$request->categoria_id);
        }

        if($request->has("q") && !empty($request->input("q"))){
            $productos->where("nombre","like","%".$request->q."%");
        }

        if($request->has("precio") && $request->input("precio") != '0'){
            $precios = explode("-",$request->precio);
            $productos->where("precio",">",$precios[0])->where("precio","<",$precios[1]);
        }

        $data["productos"] = $productos->paginate(9)->appends($request->query());

        return view("frontend.tienda.index")->with($data);
    }

    public function getCarrito(){
        $data =  [];
        return view("frontend.proceso.carrito")->with($data);
    }

    public function getCompra(){
        $data =  [];
        if(Auth::guard("client")->check()){
            $data["cliente"] = Auth::guard("client")->user();
        }

        if(!Session::has("proceso")){
            if(Auth::guard('client')->check()){
                Session::put("proceso",2);
            }else{
                Session::put("proceso",1);
            }
        }

        return view("frontend.proceso.compra")->with($data);
    }

    public function getCompraExitosa($id_orden){
        return view("frontend.proceso.compra_exitosa")->with(array(
            "id_orden" => $id_orden,
        ));
    }
}
