@extends('frontend.layout.layout')

@section('css')
<!-- SPECIFIC CSS -->
    <link href="/frontend/css/checkout.css" rel="stylesheet">

    <style>
        .disablebutton{
            pointer-events: none;
            opacity: 0.4;
        }

        .alert {
            background: #ff6868;
            color: #fff;
            margin-bottom: 30px;
            padding: 8px;
        }
        .alert p{
            font-weight: 500;
        }
    </style>
@endsection

@section('main')
<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="/">Inicio</a></li>
                <li><a href="{{ route("front.carrito") }}">Carrito de compras</a></li>
                <li>Procesar compra</li>
            </ul>
        </div>
        <h1>Procesar compra</h1>

    </div>
    <!-- /page_header -->
    <div class="row">
        <div class="col-md-12">
            @if($errors->any())
                <div class="alert">
                    <p>No hemos podido procesar tu petición</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="step first {{ Session::get('proceso') == 1 ? '' : 'disablebutton' }}">
                <h3>1. Datos de usuario</h3>
                <ul class="nav nav-tabs" id="tab_checkout" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Registrate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tab_2" role="tab" aria-controls="tab_2" aria-selected="false">Inicia sesión</a>
                    </li>
                </ul>
                <div class="tab-content checkout">
                    <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
                        <form action="{{ route("accion.registro") }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input value="{{ isset($cliente) ? $cliente->email : '' }}" type="email" class="form-control" required name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input value="" autocomplete='off' type="password" class="form-control" required name="password" placeholder="Contraseña">
                            </div>
                            <hr>
                            <div class="row no-gutters">
                                <div class="col-6 form-group pr-1">
                                    <input value="{{ isset($cliente) ? $cliente->nombre : '' }}" type="text" class="form-control" required name="nombre" placeholder="Nombre">
                                </div>
                                <div class="col-6 form-group pl-1">
                                    <input value="{{ isset($cliente) ? $cliente->apellido : '' }}" type="text" class="form-control" required name="apellido" placeholder="Apellidos">
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="form-group">
                                <input value="{{ isset($cliente) ? $cliente->direccion : '' }}" type="text" class="form-control" name="direccion" placeholder="Dirección completa">
                            </div>
                            {{-- <div class="row no-gutters">
                                <div class="col-6 form-group pr-1">
                                    <input type="text" class="form-control" placeholder="City">
                                </div>
                                <div class="col-6 form-group pl-1">
                                    <input type="text" class="form-control" placeholder="Postal code">
                                </div>
                            </div>--}}
                            <!-- /row -->
                            {{-- <div class="row no-gutters">
                                <div class="col-md-12 form-group">
                                    <div class="custom-select-form">
                                        <select class="wide add_bottom_15" name="country" id="country">
                                            <option value="" selected>Country</option>
                                            <option value="Europe">Europe</option>
                                            <option value="United states">United states</option>
                                            <option value="Asia">Asia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>--}}
                            <!-- /row -->
                            <div class="form-group">
                                <input value="{{ isset($cliente) ? $cliente->telefono : '' }}" type="text" class="form-control" placeholder="Teléfono" name="telefono">
                            </div>
                            {{--
                            <hr>
                            <div class="form-group">
                                <label class="container_check" id="other_addr">Other billing address
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div id="other_addr_c" class="pt-2">
                                <div class="row no-gutters">
                                    <div class="col-6 form-group pr-1">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="col-6 form-group pl-1">
                                        <input type="text" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Full Address">
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-6 form-group pr-1">
                                        <input type="text" class="form-control" placeholder="City">
                                    </div>
                                    <div class="col-6 form-group pl-1">
                                        <input type="text" class="form-control" placeholder="Postal code">
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row no-gutters">
                                    <div class="col-md-12 form-group">
                                        <div class="custom-select-form">
                                            <select class="wide add_bottom_15" name="country" id="country_2">
                                                <option value="" selected>Country</option>
                                                <option value="Europe">Europe</option>
                                                <option value="United states">United states</option>
                                                <option value="Asia">Asia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Telephone">
                                </div>
                            </div>
                            <!-- /other_addr_c -->
                            --}}
                            <hr>
                            <input type="submit" class="btn_1 full-width" value="Registrar mi cuenta">
                        </form>
                    </div>
                    <!-- /tab_1 -->
                    <div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="tab_2">
                        <form action="{{ route("accion.login_web") }}" method="POST">
                            {{ csrf_field() }}
                            {{-- <a href="#0" class="social_bt facebook">Login con Facebook</a>
                            <a href="#0" class="social_bt google">Login con Google</a>--}}
                            <div class="form-group">
                                <input type="email" required class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" required class="form-control" placeholder="Contraseña" name="password" id="password_in">
                            </div>
                            {{-- <div class="clearfix add_bottom_15">
                                <div class="checkboxes float-left">
                                    <label class="container_check">Recordarme
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="float-right"><a id="forgot" href="#0">¿Olvide mi contraseña?</a></div>
                            </div>
                            <div id="forgot_pw">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
                                </div>
                                <p>A new password will be sent shortly.</p>
                                <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                            </div>--}}
                            <hr>
                            <input type="submit" class="btn_1 full-width" value="Iniciar sesión">
                        </form>
                    </div>
                    <!-- /tab_2 -->
                </div>
            </div>
            <!-- /step -->
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="step middle payments {{ Session::get('proceso') == 2 ? '' : 'disablebutton' }}">
                <form action="{{ route("accion.metodo_pago") }}" method="POST">
                {{ csrf_field() }}

                <h3>2. Métodos de pago</h3>
                <ul>
                    <li>
                        <label class="container_radio">Tarjeta de crédito / Débito<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                            <input type="radio" name="metodo" value="tarjeta" {{ Session::has("metodo_pago") && Session::get("metodo_pago") == 'tarjeta' ? 'checked' : '' }} {{ !Session::has("metodo_pago") ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                        </label>
                    </li>
                    {{-- <li>
                        <label class="container_radio">Paypal<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                            <input type="radio" name="payment">
                            <span class="checkmark"></span>
                        </label>
                    </li>--}}
                    <li>
                        <label class="container_radio">Depósito / Transferencia bancaria<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                            <input type="radio" name="metodo" value="efectivo" {{ Session::has("metodo_pago") && Session::get("metodo_pago") == 'efectivo' ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                        </label>
                    </li>
                </ul>
                <div class="payment_info d-none d-sm-block">
                    <figure><img src="/frontend/img/cards_all.svg" alt=""></figure>
                    <p>Procesamos pagos con tarjeta de todas estas marcas</p>
                </div>

                {{--
                <h6 class="pb-2">Shipping Method</h6>
                <ul>
                    <li>
                        <label class="container_radio">Standard shipping<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                            <input type="radio" name="shipping" checked>
                            <span class="checkmark"></span>
                        </label>
                    </li>
                    <li>
                        <label class="container_radio">Express shipping<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                            <input type="radio" name="shipping">
                            <span class="checkmark"></span>
                        </label>
                    </li>

                </ul>
                 --}}

                 <div class="text-center">
                    <input type="submit" class="btn_1" value="Continuar">
                 </div>
                </form>
            </div>
            <!-- /step -->

        </div>
        <div class="col-lg-4 col-md-6">
            <div class="step last {{ Session::get('proceso') == 3 ? '' : 'disablebutton' }}">
                <form id="formPago" action="{{ route("accion.finalizar_compra") }}" method="POST">
                {{ csrf_field() }}

                <h3>3. Resumen de compra</h3>
                <div class="box_general summary ">
                    <ul>
                        @forelse(Cart::getContent() as $item)
                        <li class="clearfix"><em>{{ $item->quantity }}x {{ $item->name }}</em>  <span>{{ moneda($item->price * $item->quantity) }}</span></li>
                        @empty
                        @endforelse
                    </ul>
                    <ul>
                        <li class="clearfix"><em><strong>Subtotal</strong></em>  <span>{{ moneda(Cart::getSubTotal()) }}</span></li>
                        <!--<li class="clearfix"><em><strong>Shipping</strong></em> <span>$0</span></li>-->

                    </ul>
                    <div class="total clearfix">TOTAL <span>{{ moneda(Cart::getTotal()) }}</span></div>
                    {{--
                    <div class="form-group">
                        <label class="container_check">Register to the Newsletter.
                            <input type="checkbox" checked>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                     --}}

                    @if(!Session::has("metodo_pago") || (Session::has("metodo_pago") && Session::get("metodo_pago") == "efectivo"))
                        <button type="submit" class="btn_1 full-width">Confirmar y pagar</button>
                    @else
                        <br>
                        <div id="paypal-button-container"></div>
                    @endif

                    <a href="{{ route('accion.volver') }}" class="" style="margin-top: 20px;display:block;text-align: center;"> Volver al paso anterior</a>
                </div>

                </form>
                <!-- /box_general -->
            </div>
            <!-- /step -->
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->
@endsection

@section('scripts')
<script
src="https://www.paypal.com/sdk/js?client-id=ASe7NMAZkOK49IJeq9Lk6b2yWlMmC2mub0IoqjrHMZtobJE3epqiQljtoh4g0yqAjjvgUWR1jsGrMmqN&locale=es_PE"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
</script>
<script>

    paypal.Buttons({
            locale: 'es_ES',
            style: {
            size: 'small',
            color: 'blue',
            shape: 'pill',
            label: 'checkout',
        },
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '{{ Cart::getTotal() }}'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                $("#formPago").submit();
            });
        }

    }).render('#paypal-button-container');
    //This function displays Smart Payment Buttons on your web page.

    // Other address Panel
    $('#other_addr input').on("change", function (){
        if(this.checked)
            $('#other_addr_c').fadeIn('fast');
        else
            $('#other_addr_c').fadeOut('fast');
    });
</script>
@endsection
