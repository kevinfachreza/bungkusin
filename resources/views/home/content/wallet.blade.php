<div class="center white  border" style="padding: 20px 0px;">
	<h6> Uang Anda Saat Ini </h6>
	<h4> Rp {{$money}} </h4>
</div>

<div class="row" style="margin:0">
	<a href="wallet/topup/voucher">
		<div class="col s6 center white border" style="margin: 0px 0px;padding:10px 0px">
			<div> <i class="material-icons medium">attach_money</i> </div>
			<div> Voucher </div>
		</div>
	</a>
	<a href="wallet/topup/transfer">
		<div class="col s6 center white border"  style="margin: 0px 0px;padding:10px 0px">
			<div> <i class="material-icons medium">local_atm</i> </div>
			<div> Transfer </div>
		</div>
	</a>
</div>
<div class="collection pesanan">
	<div class="collection-item">
		<div class="row" style="margin:0;">
			<div class="col s10">
				<strong>Mutasi Dompet</strong>
			</div>
		</div>
	</div>		
			@foreach($wallet_detail as $detail)
				<a href="#!" class="collection-item">
					<div class="row" style="margin:0;">
						<div class="col s10">
							@if($detail->method == 1) 
							Voucher
							@elseif($detail->method == 0)
							Transfer
							@else
							Pengeluaran
							@endif	
							<strong>{{number_format($detail->nominal,0)}} </strong>  <br>
							{{ date('l, d F, H:i', strtotime($detail->created_at)) }} <br>
						</div>
					</div>
				</a>
			@endforeach
</div>

