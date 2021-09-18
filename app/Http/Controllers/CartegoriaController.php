<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    public function index(Request $request){
        $object = Categoria::all();
        if($request->has("lista") && $request->input("lista")=="archivados"){
            $object = Categoria::onlyTrashed()->get();
        }
        return view("categorias.lista")->with(array(
            "categorias" => $object,
        ));
    }
    public function create(){
        return view("categorias.create");
    }

    public function edit($id,Request $request){
        $data["object"] = Categoria::withTrashed()->where("id", $id)->first();
        if($request->has("accion")){
            $data["object"]->restore();
            return redirect()->route("categorias.index")->with([
                "status" => true,
                "message" => "Categoria restaurado correctamente"
            ]);
        }
        return view("categorias.edit")->with($data);
    }

    public function update($id,Request $request){
        //$object = request()->all();
        $object = request()->except(['_token','_method']);
        //return response()->json($object);
        if($request->hasFile("ruta_imagen")){
            //return $this->uploadImage("foto-objeto",$request->file("foto"),"/public/categorias");
            $objeto=Categoria::findOrFail($id);
            $img= json_decode($objeto->ruta_imagen,true);
            Storage::delete($img['full']);
            Storage::delete($img['medium']);
            Storage::delete($img['thumb']);

            $object['ruta_imagen']=$this->uploadImage("foto-objeto-".date("dmYHis"),$request->file("ruta_imagen"),"/public/categorias");
        }
        Categoria::where('id',"=",$id)->update($object);
        
        
        return redirect()->route("categorias.index");
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            "nombre"=>"required|max:100",
            "precio"=>"required",
        ]);

        if($validator->fails()){
            return redirect()->back()->with(array(
                "status"=>false,
                "errors"=>$validator->messages(),
            ));
        }

        $object=new Categoria();

        if($request->has("id")){
            $object = Categoria::find($request->id);
        }
        
        $object->nombre=$request->input("nombre");
        $object->descripcion=$request->input("descripcion");
        $object->precio=$request->input("precio");

        if($request->hasFile("ruta_imagen")){
            //return $this->uploadImage("foto-objeto",$request->file("foto"),"/public/categorias");
            $object->ruta_imagen=$this->uploadImage("foto-objeto-".date("dmYHis"),$request->file("ruta_imagen"),"/public/categorias");
        }
        
        if($object->save()){
            return redirect()->route("categorias.index");
        }

        return redirect()->back()->with(array(
            "status"=>false,
            "errors"=>null,
            "message"=>"Error al crear",
        ));
    }
    private function uploadImage($nombre,$file,$path_save){
        $ruta = "../storage/app".$path_save;
        $extension = $file->getClientOriginalExtension();
        Image::make($file)->resize(100,100)->save($ruta."/".$nombre."-thumb.".$extension);
        Image::make($file)->resize(400,400)->save($ruta."/".$nombre."-medium.".$extension); 
        Image::make($file)->save($ruta."/".$nombre."-full.".$extension); 
        
        $fotos = array(
            "thumb" => str_replace("../storage/app/","",$ruta)."/".$nombre."-thumb.".$extension,
            "medium" => str_replace("../storage/app/","",$ruta)."/".$nombre."-medium.".$extension,
            "full" => str_replace("../storage/app/","",$ruta)."/".$nombre."-full.".$extension,
        );

        return json_encode($fotos);
    }

    public function destroy($id,Request $request){
        $object = Categoria::withTrashed()->where("id", $id)->first();

        if($request->has('eliminar')){
            $object->forceDelete();
        }else{
            $object->delete();
        }

        return redirect()->route("categorias.index")->with([
            "status" => true,
            "message" => "Categoria eliminado correctamente"
        ]);
    }
}
