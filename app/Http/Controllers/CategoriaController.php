<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    public function index(Request $request){
        $object = Categoria::all();
        if($request->has("lista") && $request->input("lista") == "archivados"){
            $object = Categoria::onlyTrashed()->get();
        }
        return view("categorias.lista")->with(array(
            "categorias" => $object,
        ));
    }

    public function create(){
        return view("categorias.crear");
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
        return view("categorias.crear")->with($data);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            "nombre"=>"required|max:100",
        ]);

        if($validator->fails()){
            return redirect()->back()->with(array(
                "status"    =>  false,
                "errors"    =>  $validator->messages(),
            ));
        }

        $object = new Categoria();

        if($request->has("id")){
            $object = Categoria::find($request->id);
        }


        $object->nombre = $request->input("nombre");
        $object->descripcion = $request->input("descripcion");

        if($object->save()){
            return redirect()->route("categorias.index");
        }

        return redirect()->back()->with(array(
            "status"    =>  false,
            "errors"    =>  null,
            "message"   =>  "Error al crear",
        ));
    }

    private function uploadImage($nombre,$file,$path_save){
        $ruta = "../storage/app". $path_save;
        $extension = $file->getClientOriginalExtension();

        Image::make($file)->resize(100,100)->save($ruta."/".$nombre."-thumb.". $extension);
        Image::make($file)->resize(400,400)->save($ruta."/".$nombre."-medium.". $extension);
        Image::make($file)->save($ruta."/".$nombre."-full.". $extension);

        $fotos = array(
            "thumb" => str_replace("../storage/app/","",$ruta)."/".$nombre."-thumb.". $extension,
            "medium" => str_replace("../storage/app/","",$ruta)."/".$nombre."-medium.". $extension,
            "full" => str_replace("../storage/app/","",$ruta)."/".$nombre."-full.". $extension,
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
