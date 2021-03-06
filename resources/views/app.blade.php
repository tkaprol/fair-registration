<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Expo Booking</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgbCXS_UO7waD40rxRSqJfazjr_gGdsag&sensor=false"></script>

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Expo</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="http://underscorejs.org/underscore-min.js"></script>
	<script src="https://googlemaps.github.io/js-map-label/src/maplabel-compiled.js"></script>
	<!-- Backbone.js codes -->

	<!-- vendor libraries -->
  <script src="/js/vendor/backbone.js"></script>
  <script src="/js/vendor/Faker.js"></script>

  <!-- app -->
  <script src="/js/models/expo.js"></script>
  <script src="/js/models/hall.js"></script>
  <script src="/js/collections/expo.js"></script>
  <script src="/js/collections/hall.js"></script>
  <script src="/js/views/expo_list_item_view.js"></script>
  <script src="/js/views/expo_list_view.js"></script>
  <script src="/js/views/expo_marker_view.js"></script>
	<script src="/js/views/hall_list_view.js"></script>
	<script src="/js/views/hall_marker_view.js"></script>

  <script src="/js/app.js?dad"></script>


</body>
</html>
