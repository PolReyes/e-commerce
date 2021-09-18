
<!DOCTYPE html>
<html lang="es">

<head>
    @include("frontend.layout.partials.head")
    @yield("css")
</head>

<body>

	<div id="page">

	@include("frontend.layout.partials.menu")

	<main @if(isset($bg_gray)) class="bg_gray" @endif>
		@yield("main")
	</main>
	<!-- /main -->

    @include("frontend.layout.partials.footer")

	</div>
	<!-- page -->

    @include("frontend.layout.partials.scripts")
    @yield("scripts")

</body>
</html>
