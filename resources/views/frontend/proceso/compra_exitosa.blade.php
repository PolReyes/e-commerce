@extends('frontend.layout.layout')

@section('css')
<!-- SPECIFIC CSS -->
    <link href="/frontend/css/checkout.css" rel="stylesheet">
@endsection

@php
    $bg_gray=true;
@endphp

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div id="confirm">
                <div class="icon icon--order-success svg add_bottom_15">
                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                        <g fill="none" stroke="#8EC343" stroke-width="2">
                            <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                            <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                        </g>
                    </svg>
                </div>
            <h2>¡Compra exitosa!</h2>
            <p>Su compra se ha procesado correctamente, verifique su comprobante de pago con los detalles a continuación!</p>
            <div class="text-center">
                <a href="#" class="btn_1">Ver orden</a>
            </div>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->
@endsection

