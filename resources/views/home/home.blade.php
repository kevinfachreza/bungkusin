@extends('layouts.app')

@section ('title')
Home
@endsection

@section('content')
<div class="navbar-fixed">
	<nav class="nav-extended red darken-1">
		<div class="nav-wrapper">
			<a href="{{url('home')}}" class="brand-logo left" style="margin-left: 10px"><img src="{{asset('assets/logo/navbar.png')}}" height="25"></a>
		</div>
	</nav>
</div>

<nav class="nav-extended red darken-1" style="bottom: 0;position: fixed;z-index: 997">
	<div class="nav-wrapper">
		<div class="row" style="margin-bottom: 0px;">
			<div class="col s12">
				<ul class="tabs red darken-1" id="bottom-navbar">
					<li class="tab col s3">
						@if($tab_active == 'home')
						<a class="active white-text" id="nav-home" href="#home">
							@else
							<a class="white-text" id="nav-home" href="#home">
								@endif
								<i class="material-icons">home</i>
							</a>
						</li>
						<li class="tab col s3">
							@if($tab_active == 'search')
							<a class="active white-text" id="nav-search" href="#search">
								@else
								<a class="white-text" id="nav-search" href="#search">
									@endif
									<i class="material-icons">search</i>
								</a>
							</li>
							<li class="tab col s3">
								@if($tab_active == 'myorder')
								<a class="white-text active" id="nav-order" href="#myorder">
									@else
									<a class="white-text" id="nav-order" href="#myorder">
										@endif
										<i class="material-icons">local_dining</i>
									</a>
								</li>
								<li class="tab col s3">
									@if($tab_active == 'wallet')
									<a class="white-text active" id="nav-wallet" href="#wallet">
										@else
										<a class="white-text active" id="nav-wallet" href="#wallet">
											@endif
											<i class="material-icons">account_balance_wallet</i>
										</a>
									</li>
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
	<div id="search" class="col s12 menu-container grey lighten-4" >@include('home.content.search')</div>
	<div id="myorder" class="col s12 menu-container">@include('home.content.order')</div>
	<div id="wallet" class="col s12 menu-container grey lighten-4">@include('home.content.wallet')</div>
	@endsection

	@section('js')
	<script type="text/javascript">

		$('.carousel.carousel-slider').carousel({fullWidth: true});
	</script>

	<script type="text/javascript">
		$("#bottom-navbar li a").click(function (){
			var active = $("#bottom-navbar").find(".active").attr('id')
		});
	</script>

	<script type="text/javascript">
		$("#search-form").submit(function(e){
			e.preventDefault();
			var keyword = $('#search_pkl_keyword').val();

			$.get( "{{url('api/penjual/search')}}?keyword="+keyword, function( data ) {
				//console.log(data);
			})

			.done(function(data) {
				data = data[0];
				if(data.status)
				{
					$("#search-result-item").empty();
					$('#search-result').show();
					$('#search-result-empty').hide();

					var html = '';
					for(i = 0;i<data.pkl.length;i++)
					{
						html = 
						'<li class="collection-item avatar">'+
							'<img src="{{asset('')}}/'+data.pkl[i].avatar+'" alt="" class="circle">'+
							'<span class="title">'+data.pkl[i].name+'</span>'+
							'<p>'+data.pkl[i].alamat+''+
							'</p>'+
							'<a href="{{url("pkl")}}/'+data.pkl[i].id+'" class="secondary-content"><i class="material-icons">send</i></a>'+
						'</li>'
						$(html).appendTo( "#search-result-item" );
					}

				}
				else
				{
					$('#search-result-empty').show();
					$('#search-result').hide();
				}
			})
			.fail(function() {
				alert( "error" );
			});

		})

	</script>
	@endsection