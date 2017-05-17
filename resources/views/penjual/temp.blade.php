@extends('layouts.app2')

@section ('title')
	Home
@endsection

 @section('navbar')
		
		<div class="navbar-fixed nav-extended">
		<nav  class='red darken-2 nav-extended'>
		<div class="nav-wrapper" style="margin-left:3px; margin-right:5px">
			<a href="#" data-activates="slideout" class="brand-logo left button-collapse"><i class="material-icons">menu</i>Lik Zentrum
		<ul class="right valign-wrapper">
        <li class="hide-on-med-and-down">Saldo : 50.000 Gope  </li>
		<li><a class='dropdown-button' href='#' data-gutter="5" data-constrainWidth="true" data-beloworigin="true"><i class="material-icons">credit_card</i></a></li>
		
		
		</ul>
		</div>
		
		<div class="nav-content">
				<ul class="tabs tabs-transparent">
					<li class="tab"><a href="#LekWallet">Wallet</a></li>
				</ul>
			</div>
		</nav>
		
		</div>
	@endsection	
		
	@section('content')
  <div id="LekWallet" class="col s12 menu-container">@include('penjual.dompetlek')</div>
  
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
      menuWidth: 300, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );
  
  </script>
  
<script type="text/javascript">
    $("#cairkan").hide();
  function setzero()
  {
    $("#money-amount").text('Rp 0');
    $("#cairkan").show();
  }

</script>
       @endsection