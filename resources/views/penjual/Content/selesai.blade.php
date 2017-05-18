<div class="container"  style="margin-top:50px;margin-bottom:30px;weight:100vh">
  <div class="row">
  <div class="col s12" style=margin-top:4px>
   <h3 style="font-weight:200">Selesai</h3>
  </div>
  <div class="col s12" style="margin-top:10px;">
	<div class="collection">
		@foreach($siap as $orderan)
        <a href="#modal{{ $orderan->id }}" class="collection-item">
			<p>{{$orderan->name}}</p> 
			@foreach($orderan->pesan2 as $item)
			<p>{{$item->nama}} x {{$item->jumlah}} </p>
			@endforeach
			<p>Rp. {{number_format($orderan->total_harga,0)}}</p>
		</a>
		<div id="modal{{ $orderan->id }}" class="modal">
			<div class="modal-content">
			  <p>Apakah pesanan sudah diambil?</p>
			</div>
			<div class="modal-footer">
			  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Belum</a>
			  <a href="{{url('penjual/ambil')}}/{{ $orderan->id }}" class="modal-action modal-close waves-effect waves-green btn-flat">Iya</a>
			</div>
		</div>
		
		@endforeach
		
      </div>
    </div>
		
	</div>
</div>
