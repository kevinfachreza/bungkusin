@extends('layouts.app')

@section('content')
<div class="navbar-fixed" >
	<nav>
		<div class="nav-wrapper red darken-1">
			<a href="#!" class="left brand-logo" style="font-size: 1.2rem">Transfer</a>
		</div>
	</nav>
</div>


<div class="row" style="margin-top: 20px">
	<form class="col s12" method="POST">
		{{csrf_field()}}
		<div class="row">
			<div class="input-field col s12">
				<select name="nominal">
					<option value="" disabled selected>Pilih nominal</option>
					<option value="20000">Rp 20.000</option>
					<option value="50000">Rp 50.000</option>
					<option value="100000">Rp 100.000</option>
				</select>
			</div>
		</div> <!-- Modal Trigger -->
		<button class="waves-effect waves-light btn red darken-1" type="submit" style="width: 100%"><i class="material-icons right">send</i>Submit</button>
	</form>
</div>




@endsection
@section('js')

<script type="text/javascript">

	$(document).ready(function() {
		$('select').material_select();
	});

</script>
@endsection
