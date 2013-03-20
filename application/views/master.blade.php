<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fourattic.com | Accounttic </title>
	{{ HTML::style('css/vendors/bootstrap.min.css') }}
	{{ HTML::style('css/main.css') }}
	{{ HTML::style('css/vendors/ui-lightness/jquery-ui-1.10.2.custom.min.css') }}

	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
</head>
<body>
	<div class="navbar">
		<h1>accounttic</h1>
	</div>
	<div class="container-fluid well">
		<div class="wrapper">
			  <div class="row-fluid">
			    <div class="span2">
			      	<aside>
			      		<div class="btn-group btn-group-vertical">
			      			<li class="btn btn-primary"><i class="icon-home icon-white"></i>home</li>
							<li class="btn btn-primary"><i class="icon-shopping-cart icon-white"></i>payments</li>
							<li class="btn btn-primary"><i class="icon-envelope icon-white"></i>payment methods</li>						
							<li class="btn btn-primary"><i class="icon-fire icon-white"></i>clients</li>
							<li class="btn btn-primary"><i class="icon-briefcase icon-white"></i>companies</li>
							<li class="btn btn-primary"><i class="icon-globe icon-white"></i>jobs</li>
							<li class="btn btn-primary"><i class="icon-user icon-white"></i>users</li>
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
	
	<div id="dialog" title="Confirm the action" style="display:none">This will remove this job permanently. Are you sure?</div>
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script>

	window.onload = function() {

		//If clicked, show the dialog
		$('.btn-danger').click(function(event) {
			event.preventDefault();
			//$("#dialog").dialog("open");
			$( "#dialog" ).dialog(
			{
				resizable: false,
				modal: true,
				buttons: 
				{
					"Confirm": function()
					{
						document.location = event.delegateTarget.attributes[0].textContent;
					},
					"Cancel": function()
					{
						$(this).dialog("close");
					}
				}
			});
		});
	}

</script>
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
	{{ HTML::script('/js/bootstrap.min.js') }}
</body>
</html>