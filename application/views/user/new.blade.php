@layout('master')

@section('container')
	<h3>Create a New User</h3>

	{{ Form::open('users/') }}
		{{ Form::label('name', 'Your name and surname:') }}
		{{ Form::text('name') }}

		{{ Form::label('email', 'Your email:') }}
		{{ Form::email('email') }}

		{{ Form::label('password', 'Enter a password:') }}
		{{ Form::password('password') }}

		<div>
			{{ Form::submit('Create', array('class' => 'btn btn-success')) }}
		</div>

	{{ Form::close() }}
@endsection