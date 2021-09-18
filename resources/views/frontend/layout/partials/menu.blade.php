<header class="version_1">
		<div class="layer"></div><!-- Mobile menu overlay mask -->
		<div class="main_header">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
						<div id="logo">
							<a href="/"><img src="/images/logo-peruforce.png" alt="" width="167" height="72"></a>
						</div>
					</div>
					<nav class="col-xl-6 col-lg-7">
						<a class="open_close" href="javascript:void(0);">
							<div class="hamburger hamburger--spin">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</a>
						<!-- Mobile menu button -->
						<div class="main-menu">
							<div id="header_menu">
								<a href="/"><img src="/images/logo-peruforce.png" alt="" width="167" height="72"></a>
								<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
							</div>
							<ul>
								<li>
									<a href="/">Inicio</a>
								</li>
								<li>
									<a href="/tienda">Tienda</a>
								</li>
								<li>
									<a href="#">Blog</a>
								</li>
								<li>
									<a href="#">Contacto</a>
								</li>
							</ul>
						</div>
						<!--/main-menu -->
					</nav>
					<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
						<a class="phone_top" href="tel://+51987654321"><strong><span>¿Necesitas ayuda?</span>+51 987 654 321</strong></a>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- /main_header -->

		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 col-md-3">
						<nav class="categories">
							<ul class="clearfix">
								<li><span>
										<a href="#">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Categorías
										</a>
									</span>
									<div id="menu">
										<ul>
                                            @foreach (App\Categoria::all() as $c)
                                                <li><span><a href="/tienda?categoria_id[]={{ $c->id }}">{{ $c->nombre }}</a></span></li>
                                            @endforeach
                                            <li><span><a href="/tienda">Ver todos</a></span></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
						<form action="/tienda" method="get">
                            <div class="custom-search-input">
                                <input type="text" name="q" value="{{ Request::has("q") ? Request::get("q") : '' }}" placeholder="Busca tu producto aquí">
                                <button type="submit"><i class="header-icon_search_custom"></i></button>
                            </div>
                        </form>
					</div>
					<div class="col-xl-3 col-lg-2 col-md-3">
						<ul class="top_tools">
                            @if(Cart::getContent()->count() > 0)
							<li>
								<div class="dropdown dropdown-cart">
									<a href="cart.html" class="cart_bt"><strong>{{ Cart::getContent()->count() }}</strong></a>
									<div class="dropdown-menu">
										<ul>
                                            @foreach(Cart::getContent() as $item)
                                            <li>
												<a href="product-detail-1.html">
													<figure><img src="/frontend/img/products/product_placeholder_square_small.jpg" data-src="{{ url('imagenes/'. json_decode($item->associatedModel->ruta_imagen)->thumb) }}" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>{{ $item->name }}</span>{{ moneda($item->price) }} x {{ $item->quantity }}</strong>
												</a>
												<a href="{{ route("accion.eliminar_carrito",["producto_id"=>$item->id]) }}" class="action"><i class="ti-trash"></i></a>
                                            </li>
                                            @endforeach
										</ul>
										<div class="total_drop">
											<div class="clearfix"><strong>Total</strong><span>{{ moneda(Cart::getTotal()) }}</span></div>
											<a href="{{ route('front.carrito') }}" class="btn_1 outline">Ver carrito</a><a href="{{ route('front.compra') }}" class="btn_1">Comprar ya!</a>
										</div>
									</div>
								</div>
								<!-- /dropdown-cart-->
                            </li>
                            @endif
							{{-- <li>
								<a href="#0" class="wishlist"><span>Wishlist</span></a>
							</li>--}}
							<li>
								<div class="dropdown dropdown-access">
									<a href="#" class="access_link"><span>Account</span></a>
									<div class="dropdown-menu">
										@if(!Auth::guard("client")->check())
										<a href="#" class="btn_1">Ingresar</a>
										@endif
										<ul>
                                            @if(Auth::guard("client")->check())
											<li>
												<a href="track-order.html"><i class="ti-truck"></i>{{ Auth::guard("client")->user()->nombre }}</a>
                                            </li>
											<li>
												<a href="account.html"><i class="ti-package"></i>My Orders</a>
											</li>
											<li>
												<a href="account.html"><i class="ti-user"></i>My Profile</a>
                                            </li>
											<li>
												<a href="{{ route('accion.logout_web') }}"><i class="ti-help-alt"></i>Cerrar sesión</a>
                                            </li>
                                            @endif
										</ul>
									</div>
								</div>
								<!-- /dropdown-access-->
							</li>
							{{--<li>
								<a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
							</li>--}}
							{{-- <li>
								<a href="#menu" class="btn_cat_mob">
									<div class="hamburger hamburger--spin" id="hamburger">
										<div class="hamburger-box">
											<div class="hamburger-inner"></div>
										</div>
									</div>
									Categories
								</a>
							</li>--}}
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<div class="search_mob_wp">
				<input type="text" class="form-control" placeholder="Search over 10.000 products">
				<input type="submit" class="btn_1 full-width" value="Search">
			</div>
			<!-- /search_mobile -->
		</div>
		<!-- /main_nav -->
	</header>
	<!-- /header -->
