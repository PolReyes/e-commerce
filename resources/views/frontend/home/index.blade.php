@extends('frontend.layout.layout')

@section('main')
    <div id="carousel-home">
			<div class="owl-carousel owl-theme">
				<div class="owl-slide cover" style="background-image: url(/frontend/img/slides/banner-main.png);">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-end">
								<div class="col-lg-6 static">
									<div class="slide-text text-right white">
										<h2 class="owl-slide-animated owl-slide-title">Perú Force</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
										Marca líder en suplementos deportivos
										</p>
										<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="#" role="button">comprar</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/owl-slide-->
				<div class="owl-slide cover" style="background-image: url(/frontend/img/slides/banner-main.png);">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-6 static">
									<div class="slide-text white">
										<h2 class="owl-slide-animated owl-slide-title">Attack Air<br>VaporMax Flyknit 3</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											Limited items available at this price
										</p>
										<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/owl-slide-->
				<div class="owl-slide cover" style="background-image: url(/frontend/img/slides/banner-main.png);">
					<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
						<div class="container">
							<div class="row justify-content-center justify-content-md-start">
								<div class="col-lg-12 static">
									<div class="slide-text text-center black">
										<h2 class="owl-slide-animated owl-slide-title">Attack Air<br>Monarch IV SE</h2>
										<p class="owl-slide-animated owl-slide-subtitle">
											Lightweight cushioning and durable support with a Phylon midsole
										</p>
										<div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/owl-slide-->
				</div>
			</div>
			<div id="icon_drag_mobile"></div>
		</div>
		<!--/carousel-->

		<ul id="banners_grid" class="clearfix">
			@foreach ($categorias as $item)
            <li>
				<a href="/tienda?categoria_id[]={{ $item->id }}" class="img_container">
					<img src="/frontend/img/blanco.jpg" data-src="{{ $item->descripcion }}" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>{{ $item->nombre }}</h3>
						<div><span class="btn_1">Comprar ahora</span></div>
					</div>
				</a>
			</li>
            @endforeach
		</ul>
		<!--/banners_grid -->

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Más vendidos</h2>
				<span>Productos</span>
				<p>Conoce nuestros productos destacados</p>
			</div>
			<div class="row small-gutters">
				<!-- /col -->
				@foreach ($productos as $p)
                    <div class="col-6 col-md-4 col-xl-3">
                        @include('frontend.layout.productos.item1',array("p"=>$p))
                        <!-- /grid_item -->
                    </div>
                @endforeach
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

		<!--<div class="featured lazy">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<div class="container margin_60">
					<div class="row justify-content-center justify-content-md-start">
						<div class="col-lg-6 wow" data-wow-offset="150">
							<h3>{{ $producto->nombre }}</h3>
							<p>{{ $producto->descripcion }}</p>
							<div class="feat_text_block">
								<div class="price_box">
									<span class="new_price">{{ moneda($producto->precio) }}</span>
									{{--<span class="old_price">$170.00</span>--}}
								</div>
								<a class="btn_1" href="{{ route("front.producto",["id"=>$producto->id]) }}" role="button">Compralo ya!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>-->
		<!-- /featured -->
@endsection

@section('scripts')
<!-- SPECIFIC SCRIPTS -->
<script src="/frontend/js/carousel-home.min.js"></script>

@endsection
