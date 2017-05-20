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
			<h5 class="center" style="margin-top: 50px">Menunggu konfirmasi<br>dari penjual</h5>
    @elseif($transaksi->status == 1)
      <h5 class="center" style="margin-top: 50px">Anda berada di urutan ke</h5>
      @if($antrian>1)
        <h1 class="center" style="font-size: 10rem;font-weight: 300">{{$antrian}}</h1>
      @else
        <h1 class="center" style="font-size: 10rem;font-weight: 300">{{$antrian}}</h1>
        <h6 class="center" style="margin-top: 10px">Pesanan anda sedang dimasak</h6>
      @endif
    @elseif($transaksi->status == 2)
        <h1 class="center" style="font-size: 10rem;font-weight: 300"><i class="material-icons large">check</i></h1>
        <h6 class="center" style="margin-top: 10px">Pesanan anda sudah siap diambil</h6>
  	@endif

  	


  	<div class="col s12 center" style="margin-top: 20px">
  		<a href="home.php" class="waves-effect waves-light btn-flat"><i class="material-icons left">home</i>Kembali ke Home</a>
  	</div>


    @if($transaksi->status == 0)
      @if($transaksi->accepted_at == NULL)
        <div class="col s12 center" style="margin-top: 100px">
          <a href="#modal1" class="waves-effect waves-light btn red darken-1"><i class="material-icons left">clear</i>Batalkan</a>
        </div>
      @endif
    @elseif($transaksi->status == 1)
      @if($antrian>2)
        <div class="col s12 center" style="margin-top: 100px">
          <a href="#modal1" class="waves-effect waves-light btn red darken-1"><i class="material-icons left">clear</i>Batalkan</a>
        </div>
      @endif
    @endif

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