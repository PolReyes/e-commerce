@extends("layout")
@section("styles")
@endsection
@section("pagina")
Editar producto
@endsection
@section("content")
<div class="row">
<div class="col-md-12">
    <a href="{{route('productos.index')}}" class="btn btn-sm btn-primary mb-2"><i class="fa fa-arrow-left"></i> Volver </a>
</div>
<div class="col-md-12">
<div class="card">
    <div class="card-header">
        <strong class="card-title">Editar Producto</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{route('productos.update',[$object->id])}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
        @include('productos.form')
        </form>
    </div>
</div>
</div>
@endsection
@section("script-table")
 
@endsection