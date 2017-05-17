@extends('layouts.app2')

@section ('title')
	Home
@endsection



@section ('style')
	 <style>
	 body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }

  li{
  margin: 0 4px;
}

ul {
  list-style-type: none;
}

.material-icons {
  font-size: 50px;
  margin-right: 3px;
}
.collection a.collection-item {
  display: block;
  transition: .25s;
  color: #000000;
}
	 .disableClick{
    pointer-events: none;
}</style>
@endsection

  @section('navbar')
		<div class="navbar-fixed nav-extended">
		<nav  class='red darken-2 nav-extended'>
		<div class="nav-wrapper" style="margin-left:3px; margin-right:5px">
			<a href="#" class="brand-logo left button-collapse">{{$nama->name}}</a>
			<a href="#" class="brand-logo hide-on-med-and-down">{{$nama->name}}</a>
			<ul class="right valign-wrapper">
			<li><a href='temp.php' data-gutter="5" data-constrainWidth="true" data-beloworigin="true"><i class="material-icons">credit_card</i></a></li>
			</ul>
		</div>
		
		<div class="nav-content">
				<ul class="tabs tabs-transparent">
					<li class="tab"><a href="#orderan">Orderan</a></li>
					<li class="tab"><a href="#antriin">Lagi Diantriin</a></li>
					<li class="tab"><a href="#selesai">Selesai</a></li>
				</ul>
			</div>
		</nav>
		
		</div>
		@endsection
		
  @section('content')
  <div id="orderan" class="col s12 menu-container">@include('penjual.Content.orderan', ['order' => $orderan])</div>
  <div id="antriin" class="col s12 menu-container">@include('penjual.Content.antriin', ['antri' => $antri])</div>
  <div id="selesai" class="col s12 menu-container">@include('penjual.Content.selesai', ['siap' => $siap])</div>
  
  <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Bungkusin Copyright</h5>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            </div>
          </div>
        </footer>
		@endsection

		
	@section('js')
	<script>$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered	
    $('.modal').modal();
	
  });
    $('.button-collapse').sideNav({
      menuWidth: 250, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );
	
  
  </script>
  @endsection
 
      