@extends('layouts.app')

@section ('title')
	Home
@endsection

@section('content')
<div class="navbar-fixed">
	<nav class="nav-extended red darken-1">
		<div class="nav-wrapper">
			<a href="home.php" class="brand-logo left" style="margin-left: 10px"><img src="assets/logo/navbar.png" height="25"></a>
		</div>
	</nav>
</div>

<nav class="nav-extended red darken-1" style="bottom: 0;position: fixed;z-index: 997">
	<div class="nav-wrapper">
		<div class="row" style="margin-bottom: 0px;">
			<div class="col s12">
				<ul class="tabs red darken-1" id="bottom-navbar">
					<li class="tab col s3"><a class="white-text" id="nav-home" href="#home">
						<i class="material-icons">home</i>
					</a></li>
					<li class="tab col s3"><a class="white-text" id="nav-search" href="#search">
						<i class="material-icons">search</i>
					</a></li>
					<li class="tab col s3"><a class="white-text" id="nav-order" href="#myorder">
						<i class="material-icons">local_dining</i>
					</a></li>
					<li class="tab col s3"><a class="white-text" id="nav-wallet" href="#wallet">
						<i class="material-icons">account_balance_wallet</i>
					</a></li>
						<!--
						<li class="tab col s3 "><a class="white-text" id="nav-more" href="#more">
							<i class="material-icons">more_horiz</i>
						</a></li>-->							
					</ul>
				</div>
			</div>
		</div>
	</nav>

	<div id="home" class="col s12 menu-container grey lighten-4" >@include('home.content.home')</div>
	<div id="search" class="col s12 menu-container grey lighten-4"  >@include('home.content.search')</div>
	<div id="myorder" class="col s12 menu-container">@include('home.content.order')</div>
	<div id="wallet" class="col s12 menu-container grey lighten-4">@include('home.content.wallet')</div>
@endsection

@section('js')
	<script type="text/javascript">
		$('.carousel.carousel-slider').carousel({fullWidth: true});
	</script>

	<script type="text/javascript">
		$("#bottom-navbar li a").click(function (){
			console.log('a');
			var active = $("#bottom-navbar").find(".active").attr('id')
			console.log(active);
		});
	</script>
@endsection