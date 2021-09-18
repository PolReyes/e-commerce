@extends("layout")
@section("styles")
@endsection
@section("pagina")
Nuevo producto
@endsection
@section("content")
<div class="row">
<div class="col-md-12">
    <a href="{{route('categorias.index')}}" class="btn btn-sm btn-primary mb-2"><i class="fa fa-arrow-left"></i> Volver </a>
</div>
<div class="col-md-12">
<div class="card">
    <div class="card-header">
        <strong class="card-title"> Producto</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{route('categorias.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input id="id" name="id" value="{{ $object->id}}"  class="form-control" aria-required="true">
        @endif

        <div class="form-group">
            <label for="nombre" class="control-label mb-1">Nombre</label>
            <input id="nombre" name="nombre" value="{{isset($object)? $object->nombre: ''}}" type="text" class="form-control" aria-required="true" aria-invalid="false">
        </div>
        <div class="form-group">
            <label for="descripcion" class="control-label mb-1">Descripción</label>
            <input id="descripcion" name="descripcion" value="{{isset($object)? $object->descripcion: ''}}" type="text" class="form-control" aria-required="true" aria-invalid="false">
        </div>
        
        <div class="form-actions form-group">
            <button type="submit" class="btn btn-success btn-sm">{{isset($object)? "Editar": "Agregar"}} Producto</button>
        </div>
        </form>
    </div>
</div>
</div>


</div>
@endsection
@section("script-table")
 
@endsection