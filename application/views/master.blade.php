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
		<h1>Accounttic</h1>
	</div>
	<div class="container-fluid">
		<div class="wrapper">
			  <div class="row-fluid">
			    <div class="span2">
			      	<aside>
			      		<div class="btn-group btn-group-vertical">
							<li class="btn">New payment</li>
							<li class="btn">New client</li>
							<li class="btn">New company</li>
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