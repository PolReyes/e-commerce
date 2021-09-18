<div class="grid_item">
    <!--<span class="ribbon hot">Hot</span>-->
    <figure>
        <a href="{{ route("front.producto",["id"=>$p->id]) }}">
            <img class="img-fluid lazy" src="/frontend/img/products/product_placeholder_square_medium.jpg" data-src="{{ url('imagenes/'. json_decode($p->ruta_imagen)->medium) }}" alt="">
        </a>
    </figure>
    {{-- <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>  --}}
    <a href="{{ route("front.producto",["id"=>$p->id]) }}">
        <h3>{{ $p->nombre }}</h3>
    </a>
    <div class="price_box">
        <span class="new_price">{{ moneda($p->precio) }}</span>
    </div>
    <form action="{{ route("accion.agregar_carrito") }}" id="form_{{ $p->id }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="producto_id" value="{{ $p->id }}">
        <input type="hidden" name="cantidad" value="1">
        <ul>
            {{-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
            <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>  --}}
            <li><a href="javascript:$('#form_{{ $p->id }}').submit();" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Añadir al carrito"><i class="ti-shopping-cart"></i><span>Añadir al carrito</span></a></li>
        </ul>
    </form>
</div>
