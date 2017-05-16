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

  @section('content')
		<div id="slideout" class="side-nav">
			<div class="row" style="margin-top:20px; height:100px">
				<div class="col s12 center" style="height:80px">
					<a onclick="$('.button-collapse').sideNav('hide');" style="height:84px"><i class="large material-icons">reorder</i></a>
				</div>
			</div>
			<div class="row" style="margin-top:60px">
			<ul>
				<li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
				<li><a href="#!">Second Link</a></li>
				<li><div class="divider"></div></li>
				<li><a class="subheader">Subheader</a></li>
				<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
			</ul>
			</div>
		</div>
		<div class="navbar-fixed nav-extended">
		<nav  class='red darken-2 nav-extended'>
		<div class="nav-wrapper" style="margin-left:3px; margin-right:5px">
			<a href="#" class="brand-logo left button-collapse">Lik Zentrum</a>
			<a href="#" class="brand-logo hide-on-med-and-down">Lik Zentrum</a>
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
  <div id="orderan" class="col s12 menu-container">@include('penjual.Content.orderan')</div>
  <div id="antriin" class="col s12 menu-container">@include('penjual.Content.orderan')</div>
  <div id="selesai" class="col s12 menu-container">@include('penjual.Content.orderan')</div>
  
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
 
      