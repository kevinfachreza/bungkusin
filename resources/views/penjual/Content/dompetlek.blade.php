<div class="center white  border" style="padding: 20px 0px; margin-top: 50px">
	<h6> Uang Anda Saat Ini  </h6>
	<h4 id="money-amount"> {{$wallet['isi']->saldo}} </h4>
	<div style="margin-top:5px"><a class="waves-effect waves-light btn red" href="{{url('penjual/abisin')}}/{{$wallet['id']}}"> Cairkan </a></div>
</div>
<div class="collection pesanan">
	<div class="collection-item">
  		<div class="row" style="margin:0;">
			<div class="col s10">
		  		<strong>Mutasi Dompet</strong>
			</div>
		</div>
	</div>
	@foreach($wallet['log'] as $tmp)
	<a href="#!" class="collection-item">
  		<div class="row" style="margin:0;">
			<div class="col s10">
			{{$tmp->Tipe}}: <strong> {{$tmp->Nilai}}</strong>  <br>
		  		{{$tmp->Tanggal}}<br>
			</div>
		</div>
	</a>
	@endforeach
</div>
            
<div id="modal1" class="modal">
    	<div class="modal-content">
      	<p>Terima Kasih! Dana akan kami transfer ke rekening anda dalam waktu maksimal 1x24 jam.</p>
    	</div>
    	<div class="modal-footer">
      	<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">OK</a>
    	</div>
</div>