@extends('layouts.app')

@section('content')
<div class="navbar-fixed" >
	<nav>
		<div class="nav-wrapper red darken-1">
			<a href="#!" class="left brand-logo" style="font-size: 1.2rem">Voucher</a>
		</div>
	</nav>
</div>

<div class="row" style="margin-top: 20px">
	<form class="col s12" method="POST">
		{{csrf_field()}}
		<div class="row">
			<div class="input-field col s12">
				<input id="email" type="text" class="validate" name="voucher">
				<label for="email">Masukkan Kode Voucher</label>
			</div>
		</div> <!-- Modal Trigger -->
		<button class="waves-effect waves-light btn red darken-1" type="submit" style="width: 100%"><i class="material-icons right">send</i>Submit</button>
	</form>
</div>




@endsection
@section('js')
@endsection
