<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fourattic.com | Accounttic </title>
	{{ HTML::style('css/vendors/bootstrap.min.css') }}
	{{ HTML::style('css/main.css') }}
	{{ HTML::style('css/vendors/ui-lightness/jquery-ui-1.10.2.custom.min.css') }}
	{{ HTML::style('css/vendors/datepicker.css') }}

	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'>
  

</head>
<body>
	<div class="navbar">
		<h1><a href="/">accounttic</a></h1>
	</div>
	<div class="container-fluid well">
		<div class="wrapper">
			  <div class="row-fluid">
			    <div class="span2">
			      	<aside>
			      		<div class="btn-group btn-group-vertical">
			      			<li class="btn btn-primary"><a href="/"><i class="icon-home icon-white"></i>home</li></a>
							<li class="btn btn-primary"><i class="icon-shopping-cart icon-white"></i>payments</li>
							<li class="btn btn-primary"><i class="icon-envelope icon-white"></i><a href="/methods/">payment methods</a></li>						
							<li class="btn btn-primary"><a href="/clients"><i class="icon-fire icon-white"></i>clients</a></li>
							<li class="btn btn-primary"><a href="/jobs"><i class="icon-globe icon-white"></i>jobs</a></li>
							<li class="btn btn-primary"><a href="/users"><i class="icon-user icon-white"></i>users</li></a>
							<li class="btn btn-primary"><a href="/accounts"><i class="icon-book icon-white"></i>accounts</li></a>
						</div>
					</aside>
			    </div>
			    <div class="span10">
			    	@yield('heading')
			        @yield('container')
			    </div>
			  </div>
			</div>
	</div>
	
	<div id="dialog" title="Confirm the action" style="display:none">This will remove this entry permanently. Are you sure?</div>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
	<script>

	window.onload = function() {
		//If clicked, show the dialog
		$('.btn-danger').click(function(event) {
			event.preventDefault();
			$( "#dialog" ).dialog(
			{
				resizable: false,
				modal: true,
				buttons: 
				{
					"Confirm": function()
					{
						document.location = event.delegateTarget.attributes[0].nodeValue;
					},
					"Cancel": function()
					{
						$(this).dialog("close");
					}
				}
			});
		});  		
	}
	$(function() {
			$('#dp1').datepicker({
				format: 'dd/mm/yyyy'
			});
		});
</script>
	{{ HTML::script('/js/bootstrap.min.js') }}

</body>
</html>