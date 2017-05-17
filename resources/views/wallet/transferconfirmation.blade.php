@extends('layouts.app')

@section('content')
<div class="navbar-fixed" >
	    	<nav>
	      	<div class="nav-wrapper red darken-1">
	        		<a href="#!" class="left brand-logo" style="font-size: 1.2rem">Konfirmasi Transfer</a>
	      	</div>
	    	</nav>
  	</div>

  	<div class="row center" style="margin-top: 50px">
  		<h6> Silahkan transfer sebesar </h6>
  		<h3> Rp {{$nominal}}.<span class="red lighten-4">{{$nominal_id}}</span></h3>
  		<h6 style="font-size: 0.8rem" class="red-text"> *Transfer dengan nominal sama, hingga 3 angka terakhir </h6>
  		<div class="col s12">
  			<h6> Sebelum </h6>
  			<h5> {{date("d M Y")}}, 23:59 </h5>
  		</div>
  		<div class="col s12">
	  		<ul class="collection" style="margin-top: 20px">
				<li class="collection-item">
					<div class="row left-align" style="margin: 0">
						<div class="col s4" style="padding-top: 20px">
							<img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/5e/BankCentralAsia-logo.svg/640px-BankCentralAsia-logo.svg.png" class="responsive-img">
						</div>
						<div class="col s8">
							BCA<br>
							721-213-230<br>
							a.n PT Bungkusin <br>
						</div>
					</div>
				</li>
				<li class="collection-item">
					<div class="row left-align" style="margin: 0">
						<div class="col s4" style="padding-top: 20px">
							<img src="http://3.bp.blogspot.com/-YIjg8YYhtzk/Vkj3HfpLvXI/AAAAAAAAARQ/kvZDemP5Vc0/s1600/Logo%2BBank%2BMandiri%2BStandard%2BJPEG.jpg" class="responsive-img">
						</div>
						<div class="col s8">
							Mandiri<br>
							141-00-122231313-9<br>
							a.n PT Bungkusin <br>
						</div>
					</div>
				</li>
				<li class="collection-item">
					<div class="row left-align" style="margin: 0">
						<div class="col s4" style="padding-top: 20px">
							<img src="https://upload.wikimedia.org/wikipedia/en/thumb/2/27/BankNegaraIndonesia46-logo.svg/800px-BankNegaraIndonesia46-logo.svg.png" class="responsive-img">
						</div>
						<div class="col s8">
							BNI<br>
							222-1231-333<br>
							a.n PT Bungkusin <br>
						</div>
					</div>
				</li>
		    </ul>
	    </div>
	    <div class="col s12 hide">
	    		Batas Waktu Pembayaran
    			<h3 id="demo"></h3>
	    </div>
	    	<div class="col s12">
		<a href="{{url('')}}" class="waves-effect waves-light btn-flat"><i class="material-icons left">home</i>Kembali ke Home</a>
		</div>
  	</div>





@endsection
@section('js')
@endsection
