

@extends('layouts.app')

@section ('title')
Home
@endsection

@section('content')

<div class="navbar-fixed" >
	<nav class="red darken-1">
		<div class="nav-wrapper">
			<a href="#!" class="left brand-logo" style="font-size: 1.2rem">Nasi Goreng Zentrum</a>
		</div>
	</nav>
</div>

<div class="row">
	<div class="col s12" style="margin-top: 50px;"> 
		<h5 class=" center" style="margin-bottom: 20px">Pesanan Anda </h5>
		<ul class="collection">
			@foreach($menus as $menu)
				@if($menu->jumlah > 0)
					
					<li class="collection-item">
						<div>{{$menu->nama}} ({{$menu->jumlah}}x)
							<span class="secondary-content">
								Rp {{number_format($menu->harga * $menu->jumlah,0)}}
							</span>
						</div>
					</li>
				@endif
			@endforeach
			<li class="collection-item grey lighten-4"><div><strong>Total</strong><span class="secondary-content black-text"><strong>Rp {{number_format($total)}}</strong></span></div></li>
		</ul>

		<ul class="collection">
			<li class="collection-item"><div>Saldo Anda<span class="secondary-content">Rp {{number_format($wallets[0]->saldo)}}</span></div></li>


			@if($wallets[0]->saldo - $total)
			<li class="collection-item grey lighten-4"><div><strong>Pembayaran Cash</strong><span class="secondary-content black-text"><strong>Rp {{number_format(($wallets[0]->saldo - $total)*-1)}}</strong></span></div></li>
			
			<li class="collection-item grey lighten-4"><div><strong>Sisa Saldo</strong><span class="secondary-content black-text"><strong>Rp 0</strong></span></div></li>

			@else

			<li class="collection-item grey lighten-4"><div><strong>Sisa Saldo</strong><span class="secondary-content black-text"><strong>Rp {{number_format($wallets[0]->saldo - $total)}}</strong></span></div></li>

			@endif
		</ul>

		<form action="{{url()->current()}}/submit" method="POST">
		{{csrf_field()}}
		@foreach($selected_menu as $temp)
			<input type="hidden" name="menu[]" value="{{$temp}}">
		@endforeach

		@foreach($selected_jumlah as $temp)
			<input type="hidden" name="jumlah[]" value="{{$temp}}">
		@endforeach


		<button class="waves-effect waves-light btn red darken-1" style="width: 100%"><i class="material-icons right">send</i>Pesan</button>

		</form>
	</div>
</div>
@endsection
