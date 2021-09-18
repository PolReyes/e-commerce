@extends('frontend.layout.layout')

@section('css')
<!-- SPECIFIC CSS -->
    <link href="/frontend/css/listing.css" rel="stylesheet">
@endsection

@section('main')
<div class="top_banner">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Inicio</a></li>
                    <li>Tienda</li>
                </ul>
            </div>
            <h1>Tienda</h1>
        </div>
    </div>
    <img src="/frontend/img/bg_cat_shoes.jpg" class="img-fluid" alt="">
</div>
<!-- /top_banner -->
    <div id="stick_here"></div>
    <div class="toolbox elemento_stick">
        <div class="container">
        <ul class="clearfix">
            <li>
                <div class="sort_select">
                    <select name="sort" id="sort">
                            <option value="popularity" selected="selected">Ordenar por popularidad</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to
                    </select>
                </div>
            </li>
        </ul>
        </div>
    </div>
    <!-- /toolbox -->


    <div class="container margin_30">

    <div class="row">
        <div class="col-lg-9">
            <div class="row small-gutters">
                @foreach ($productos as $p)
                <div class="col-6 col-md-4">
                    @include('frontend.layout.productos.item1',array("p"=>$p))
                </div>
                @endforeach
                <!-- /col -->
            </div>
            <!-- /row -->
                <div class="pagination__wrapper">
                    {{ $productos->links() }}
                </div>
            </div>
            <!-- /col -->

            <aside class="col-lg-3" id="sidebar_fixed">
            <div class="filter_col">
                <form action="" method="get">
                <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                <div class="filter_type version_2">
                    <h4><a href="#filter_1" data-toggle="collapse" class="opened">Categorías</a></h4>
                    <div class="collapse show" id="filter_1">
                        <ul>
                            @foreach ($categorias as $c)
                            <li>
                                <label class="container_check">{{ $c->nombre }} <small>{{ getCantProductos($c->id) }}</small>
                                    <input {{ Request::has("categoria_id") && in_array($c->id,Request::get("categoria_id")) ? 'checked' : '' }} type="checkbox" name="categoria_id[]" value="{{ $c->id }}">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /filter_type -->
                </div>

                <!-- /filter_type -->
                <div class="filter_type version_2">
                    <h4><a href="#filter_4" data-toggle="collapse" class="{{ Request::has("precio") ? 'opened' : 'closed' }}">Precios</a></h4>
                    <div class="collapse {{ Request::has("precio") ? 'show' : '' }}" id="filter_4">
                        <ul>
                            <li>
                                <label class="container_check">Todos<small></small>
                                    <input {{ Request::has("precio") && Request::get("precio") == '0' ? 'checked' : '' }} type="radio" name="precio" value="0">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">S/0 — S/50<small></small>
                                    <input {{ Request::has("precio") && Request::get("precio") == '0-50' ? 'checked' : '' }} type="radio" name="precio" value="0-50">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">S/50 — S/100<small></small>
                                    <input {{ Request::has("precio") && Request::get("precio") == '50-100' ? 'checked' : '' }} type="radio" name="precio" value="50-100">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">S/100 — S/500<small></small>
                                    <input {{ Request::has("precio") && Request::get("precio") == '100-500' ? 'checked' : '' }} type="radio" name="precio" value="100-500">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">S/500 — S/2000<small></small>
                                    <input {{ Request::has("precio") && Request::get("precio") == '500-2000' ? 'checked' : '' }} type="radio" name="precio" value="500-2000">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /filter_type -->
                <div class="buttons">
                    <button type="submit" class="btn_1">Filtrar</button>
                </div>
                </form>
            </div>
        </aside>
        <!-- /col -->
    </div>
    <!-- /row -->

</div>
<!-- /container -->

@endsection

@section('scripts')
<!-- SPECIFIC SCRIPTS -->
	<script src="/frontend/js/sticky_sidebar.min.js"></script>
	<script src="/frontend/js/specific_listing.js"></script>
@endsection
