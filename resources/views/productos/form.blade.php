@if(isset($object))
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
        <div class="form-group">
            <label for="precio" class="control-label mb-1">Precio</label>
            <input id="precio" name="precio" value="{{isset($object)? $object->precio: ''}}" type="text" class="form-control" aria-required="true" aria-invalid="false">
        </div>
        <div class="form-group">
            <label for="file-input" class="control-label mb-1">Imagen</label>
            <input id="file-input" name="ruta_imagen" type="file" class="form-control-file">
        </div>
        <div class="form-actions form-group">
            <button type="submit" class="btn btn-success btn-sm">{{isset($object)? "Editar": "Agregar"}} Producto</button>
        </div>