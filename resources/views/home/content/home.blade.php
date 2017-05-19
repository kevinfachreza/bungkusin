<div class="carousel carousel-slider" data-indicators="true" style="margin-bottom: 20px">
	@foreach($slides as $slide)
	<a class="carousel-item" href="{{url($slide->link)}}"><img src="{{asset($slide->img)}}"></a>
	@endforeach
</div>



<div class="row white border">
	<div class="col s12" style="padding: 5px;">
		<a class="black-text"><div class="col s10" style="padding: 0"><strong>Favoritku</strong></div></a>
	</div>
	<div class="col s12  center">
		@php $favorites_exist = 0 @endphp
		@foreach($favorites as $favorite)
		<div class="col s4">
			<a href="{{url('pkl')}}/{{$favorite->menu_id}}">
				<div class="img-cover">
					<img class="object-fit-cover" src="{{$favorite->restoran->avatar}}" height="75px">
				</div>
				<h6 style="padding:3px 5px"> {{$favorite->restoran->name}} </h6>
			</a>
		</div>
		@php $favorites_exist = 1 @endphp
		@endforeach

		@if(!$favorites_exist)
		<div class="row">Anda Belum Memiliki PKL Favorit</div>
		@endif
		

	</div>
</div>

<div class="row white border">
	<div class="col s12" style="margin:10px 0px;padding: 5px;">
		<strong>Menu Makanan</strong>
	</div>
	<div class="col s12 ">			
		@foreach($categories as $category)
		<a href="{{url('kategori')}}/{{$category->id}}">
			<div class="col s4 menu-makanan-item">
				<div class="img-cover">
					<img class="object-fit-cover" src="{{asset($category->img)}}" height="75px">
				</div>
				<h6 style="padding:3px 5px"> {{$category->nama}}</h6>
			</div>
		</a>
		@endforeach
	</div>
</div>