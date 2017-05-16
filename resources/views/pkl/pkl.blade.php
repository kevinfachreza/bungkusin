@extends('layouts.app')

@section ('title')
	Home
@endsection

@section('content')

	  	<div class="navbar-fixed" >
		    	<nav class="red darken-1">
		      	<div class="nav-wrapper">
		        		<a href="" class="left brand-logo" style="font-size: 1.2rem">{{$pkl->name}}</a>
		      	</div>
		    	</nav>
	  	</div>

		<form action="{{url()->current()}}/confirmation" method="POST">
		{{csrf_field()}}
	  	<div class="navbar-fixed bottom">
		    	<nav class="red darken-1">
		      	<div class="nav-wrapper">
		        		<a href="#!" class="left brand-logo" style="font-size: 1.2rem"><span id="total_pesanan"></span> Makanan (Rp <span id="total_harga"></span>)</a>
		        		<ul class="right">
			          	<li><button type="submit" class="btn-flat white-text" style="height: 45px">
    						<i class="material-icons">send</i></button></li>
			       	 </ul>
		        
		      	</div>
		    	</nav>
	  	</div>

	  	<div class="row">
	  		<div class="col s12 restoran-bg">
				<img src="{{asset($pkl->avatar)}}">
	  		</div>
	  		
	  	</div>

		<ul class="collection" style="margin-bottom: 56px;">
			@php $i = 1 @endphp
			@foreach($menus as $menu)
			<li class="collection-item avatar">
				<img src="{{asset($menu->img)}}" alt="" class="circle">
				<span class="title">{{$menu->nama}}</span>
				<p>Rp {{number_format($menu->harga,0)}}</p>
				<a href="#!" class="secondary-content">
					<button class="btn  sm-padding waves-effect waves-light" type="button" name="action" onclick="changePesanan(-1,-{{$menu->harga}},{{$i}})">
    						<i class="material-icons">remove</i>
					</button>
					<button class="btn sm-padding " id="food-count-{{$i}}" type="button" name="action" disabled >
    						0
					</button>
    					<button class="btn sm-padding waves-effect waves-light" type="button" name="action" onclick="changePesanan(1,{{$menu->harga}},{{$i}})">
    						<i class="material-icons">add</i>
					</button>
				</a>
				<input type="hidden" name="menu[]" value="{{$menu->id}}">
				<input type="hidden" name="jumlah[]" value="0" id="input-{{$i++}}">
			</li>
			@endforeach

		</ul>
		</form>
	    	@endsection

@section('js')

	    	<script type="text/javascript">
	    		var pesanan = 0;
	    		var harga_total = 0;
	    		function changePesanan(quantity,money,id)
	    		{
	    			var curval = $("#food-count-"+id).html();
	    			var newval = 0 + parseInt(curval) + quantity;
	    			if(newval >= 0)
	    			{
		    			$("#food-count-"+id).html(newval);
		    			$("#input-"+id).val(newval);
		    			if(pesanan+quantity >= 0)
		    			{
		    				pesanan = pesanan + quantity;
		    			}
		    			if(harga_total+money >= 0)
		    			{
		    				harga_total = harga_total + money;
		    			}
	    			}
	    			$('#total_pesanan').text(pesanan);
	    			$('#total_harga').text(harga_total);
	    		}

	    		$('#total_pesanan').text(pesanan);
	    		$('#total_harga').text(harga_total);


	    	</script>
  	@endsection 