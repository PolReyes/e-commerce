@extends("layout")
@section("styles")
<link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
@endsection
@section("pagina")
Lista de productos
@endsection
@section("content")
<div class="row">
<div class="col-md-12">
    @if(Request::has('lista'))
    <a href="{{route('productos.index')}}" class="btn btn-sm btn-primary mb-2"> <i class="fa fa-arrow-left"></i>Volver</a>
    @else
    <a href="{{route('productos.create')}}" class="btn btn-sm btn-primary mb-2">Agregar <i class="fa fa-plus"></i></a>
    @endif
    <a href="{{route('productos.index')."?lista=archivados"}}" class="btn btn-sm btn-primary mb-2">Archivados <i class="fa fa-trash"></i></a>
</div>
<div class="col-md-12">
<div class="card">
    <div class="card-header">
        <strong class="card-title">Productos @if(Request::has('lista')) archivados @endif</strong>
    </div>
    <div class="card-body">
        <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Foto</th>
                    <th>Precio</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->nombre}}</td>
                    <td>
                    <?php $img= json_decode($p->ruta_imagen,true); ?>
                    <!--/public/productos/foto-producto-thumb.jpg-->
                    <a href="{{'imagenes/'.$img['full']}}" target="_blank">
                    <center><img src="{{url('imagenes/'.$img['thumb'] )}}" alt="Producto" class="w-25"/></center>
                    </a>    
                    </td>
                    <td>S/.{{number_format($p->precio,2)}}</td>
                    <td>{{date("d/m/Y",strtotime($p->created_at))}}</td>
                    <td>
                    
                    <form
                    id="form_delete_{{$p->id}}"
                    action="{{route('productos.destroy',[$p->id])}}"
                    method="POST"
                    >
                    @if(Request::has('lista')) 
                    <input type="hidden" name="eliminar" value="eliminar"> 
                    @endif
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    </form>

                        @if(Request::has('lista')) 
                        <a class="btn btn-success btn-sm" href="{{route('productos.edit',[$p->id])."?accion=restaurar"}}"><i class="fa fa-arrow-up"></i></a>
                        @else
                        <a class="btn btn-success btn-sm" href="{{route('productos.edit',[$p->id])}}"><i class="fa fa-pencil"></i></a>
                        @endif
                       
                        <a class="btn btn-danger btn-sm" href="javascript:eliminar({{$p->id}});"><i class="fa fa-{{Request::has('lista')? 'times':'trash'}}"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>


</div>
@endsection
@section("script-table")
  <!-- Scripts -->
    <script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/js/init/datatables-init.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>

  <script>
      function eliminar(id){
        var r = confirm("¿Esta seguro que desea eliminar este producto?");
        if (r == true) {
            $("#form_delete_"+id).trigger("submit");
        } else {
        }
      }
  </script>
@endsection