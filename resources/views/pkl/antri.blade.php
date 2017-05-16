

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


  	<div class="col s12 center" style="margin-top: 20px">
  		<button id="refresh" class="waves-effect waves-light btn red darken-1"><i class="material-icons left">refresh</i>Refresh</a>
  	</div>

  	@if($transaksi->status == 0)
  		@if($transaksi->accepted_at == NULL)
  			<h5 class="center" style="margin-top: 50px">Menunggu konfirmasi<br>dari penjual</h5>
  		@else
  			<h5 class="center" style="margin-top: 50px">Anda berada di urutan ke</h5>
		  	@if($antrian>0)
		  		<h1 class="center" style="font-size: 10rem;font-weight: 300">{{$antrian}}</h1>
		  	@else
		  		<h1 class="center" style="font-size: 10rem;font-weight: 300">0</h1>
		  		<h6 class="center" style="margin-top: 10px">Pesanan anda sedang dimasak</h6>
		  	@endif
  		@endif
  	@endif

  	


  	<div class="col s12 center" style="margin-top: 20px">
  		<a href="home.php" class="waves-effect waves-light btn-flat"><i class="material-icons left">home</i>Kembali ke Home</a>
  	</div>



  	<div class="col s12 center" style="margin-top: 100px">
  		<a href="#modal1" class="waves-effect waves-light btn red darken-1"><i class="material-icons left">clear</i>Batalkan</a>
  	</div>

  	<div id="modal1" class="modal">
  		<div class="modal-content">
  			<p>Apakah Anda Yakin Akan Membatalkan Pesanan?</p>
  		</div>
  		<div class="modal-footer">
  			<a class="modal-action modal-close waves-effect waves-green btn-flat">Tidak</a>
  			<a href="home.php" class="modal-action modal-close waves-effect waves-green btn-flat">Ya</a>
  		</div>
  	</div>

@endsection

  	@section('js')

  	<script type="text/javascript">
  		$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
});

  		$('#refresh').click(function() {
    location.reload();
});

</script>

@endsection