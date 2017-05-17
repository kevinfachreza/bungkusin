
<div class="container"  style="margin-top:50px;margin-bottom:30px;weight:100vh">
  <div class="row">
  <div class="col s12" style=margin-top:4px>
   <h3 style="font-weight:200">Antri</h3>
  </div>
  <div class="col s12" style="margin-top:10px;">
	<div class="collection">
      @foreach($antri as $order)
        <a href="#modal{{ $order->id }}" class="collection-item">
      <p>{{$order->name}}</p> 
      @foreach($order->pesan1 as $item)
      <p>{{$item->nama}} x {{$item->jumlah}} </p>
      @endforeach
      <p>{{$order->total_harga}}</p>
    </a>
	<div id="modal{{ $order->id }}" class="modal">
    <div class="modal-content">
      <p>Apakah pesanan sudah siap?</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Belum</a>
      <a href="{{url('penjual/orderselesai')}}/{{ $order->id }}" class="modal-action modal-close waves-effect waves-green btn-flat">Sudah</a>
    </div>
  </div>
	
    @endforeach
      </div>
  </div>
	
	   </div>
    </div>
