@extends('frontend.layout.layout')

@section('css')
<!-- SPECIFIC CSS -->
<link href="/frontend/css/cart.css" rel="stylesheet">
@endsection

@section('main')
<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li>Carrito de compras</li>
            </ul>
        </div>
        <h1>Carrito de compras</h1>
    </div>
    <!-- /page_header -->
    <table class="table table-striped cart-list">
                        <thead>
                            <tr>
                                <th>
                                    Producto
                                </th>
                                <th>
                                    Precio
                                </th>
                                <th>
                                    Cantidad
                                </th>
                                <th>
                                    Subtotal
                                </th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(Cart::getContent() as $item)
                                <tr>
                                    <td>
                                        <div class="thumb_cart">
                                            <img src="/frontend/img/products/product_placeholder_square_small.jpg" data-src="{{ url('imagenes/'. json_decode($item->associatedModel->ruta_imagen)->thumb) }}" class="lazy" alt="Image">
                                        </div>
                                        <span class="item_cart"><a href="/producto/{{ $item->id }}">{{ $item->name }}</a></span>
                                    </td>
                                    <td>
                                        <strong>{{ moneda($item->price) }}</strong>
                                    </td>
                                    <td>
                                        <div class="numbers-row">
                                            <input type="text" value="{{ $item->quantity }}" id="{{ $item->id }}" class="qty2 cantidad" name="quantity_1">
                                        <div class="inc button_inc">+</div><div class="dec button_inc">-</div></div>
                                    </td>
                                    <td>
                                        <strong>{{ moneda($item->price * $item->quantity) }}</strong>
                                    </td>
                                    <td class="options">
                                        <a href="{{ route("accion.eliminar_carrito",["producto_id"=>$item->id]) }}"><i class="ti-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <p>No tienes productos en tu carrito actualmente</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="row add_top_30 flex-sm-row-reverse cart_actions">
                    <div class="col-sm-4 text-right">
                        <a href="/tienda" class="btn_1 gray">Seguir comprando</a>
                    </div>
                    {{--
                    <div class="col-sm-8">
                        <div class="apply-coupon">
                            <div class="form-group form-inline">
                                <input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"><button type="button" class="btn_1 outline">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                    --}}
                </div>
                <!-- /cart_actions -->

    </div>
    <!-- /container -->

    @if(count(Cart::getContent()) > 0)
    <div class="box_cart">
        <div class="container">
        <div class="row justify-content-end">
            <div class="col-xl-4 col-lg-4 col-md-6">
        <ul>
            <li>
                <span>Subtotal</span> {{ moneda(Cart::getSubTotal()) }}
            </li>
            {{-- <li>
                <span>Shipping</span> $7.00
            </li>--}}
            <li>
                <span>Total</span> {{ moneda(Cart::getTotal()) }}
            </li>
        </ul>
        <a href="{{ route("front.compra") }}" class="btn_1 full-width cart">Proceder a la compra</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- /box_cart -->
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $(".cantidad").change(function(){
            window.location.href = "/accion/actualizar_cantidad?producto_id="+ $(this).attr("id")+"&cantidad="+$(this).val();
        });
    });
</script>
@endsection
