@extends('layouts.app')

@section ('title')
Home
@endsection

@section('content')

<div class="navbar-fixed">
	<nav class="nav-extended red darken-1">
		<div class="nav-wrapper " style="margin-left: 10px">
			<a href="#" class="brand-logo left" style="font-size: 1.5rem">{{$kategori->nama}}</a>
			<ul class="right">
				<!--<li><a href="home/search.php"><i class="material-icons">search</i></a></li>-->
			</ul>
		</div>
	</nav>
</div>
<div id="menu" class="col s12 menu-container grey lighten-4">
	<div class="row">

		@foreach($pkls as $pkl)
		<div class="col s12">
			<div class="card small menu-item">
				<a href="{{url('pkl')}}/{{$pkl->user->id}}">
					<div class="card-image">
						<img src="{{asset($pkl->user->avatar)}}">
						<span class="card-title">{{$pkl->user->name}}</span>
					</div>
					<div class="card-content">
						<i class="tiny material-icons">room</i> {{$pkl->user->alamat}}
					</div>
				</a>
			</div>
		</div>
		@endforeach

	</div>
</div>

@endsection