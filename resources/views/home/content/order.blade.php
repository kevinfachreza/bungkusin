
<div class="collection pesanan">
	@foreach($transactions as $transaction)

	@if($transaction->status == 2) @php $class_local = 'done' @endphp @endif
	@if($transaction->status == 1) @php $class_local = 'ready' @endphp @endif
	@if($transaction->status == 0) @php $class_local = 'cooking' @endphp @endif
	@if($transaction->status == -1) @php $class_local = 'done' @endphp @endif


	<a href="{{url('transaction')}}/{{$transaction->id}}" class="collection-item {{$class_local}}">
		<div class="row" style="margin:0;">
			<div class="col s10">
				<i class="tiny material-icons">local_dining</i> {{$transaction->penjual_detail->name}}  <br>
				<i class="tiny material-icons">date_range</i> {{ date('d F, H:i', strtotime($transaction->created_at)) }} <br>
				<i class="tiny material-icons">cached</i> 
				@if($transaction->status == 2) Telah Diambil @endif
				@if($transaction->status == 1) Siap Diambil @endif
				@if($transaction->status == 0) Sedang dimasak @endif
				@if($transaction->status == -1) Batal @endif
			</div>
			<div class="col s2" style="padding-top: 10px;">

				@if($transaction->status == 2) <i class="small material-icons">check</i> @endif
				@if($transaction->status == 1) <i class="small material-icons">room_service</i> @endif
				@if($transaction->status == 0) <i class="small material-icons">timer</i> @endif
				@if($transaction->status == -1) <i class="small material-icons">clear</i> @endif

			</div>
		</div>
	</a>
	@endforeach
</div>

