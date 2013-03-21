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
	<div class="login_form well">
		<header>
			<h3>Login</h3>
		</header>

		{{ Form::open() }}

			{{ Form::label('email', 'Email:') }}
			{{ Form:: email('email') }}
			<div class="control-group{{ $errors->has('email') ? ' error' : '' }}">
				<p class=control-label>{{ $errors->first('email') }}</p>
			</div>

			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password') }}
			<div class="control-group{{ $errors->has('password') ? ' error' : '' }}">
				<p class=control-label>{{ $errors->first('password') }}</p>
			</div>

			<div>
			{{ Form::submit('Login', array('class' => 'btn btn-success')) }}
			</div>

		{{ Form::close() }}
	</div>
</body>
</html>