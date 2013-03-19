<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fourattic.com | Accounttic </title>
	{{ HTML::style('css/vendors/bootstrap.min.css') }}
	{{ HTML::style('css/main.css') }}
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'>

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
			      @yield('container')
			    </div>
			  </div>
			</div>
	</div>
	

	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	{{ HTML::script('/js/bootstrap.min.js') }}
</body>
</html>