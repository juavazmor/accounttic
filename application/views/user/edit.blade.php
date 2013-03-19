@layout('master')

@section('container')
	<h3>Edit the User</h3>

	{{ Form::open('users/' . $user->id, 'PUT') }}

		{{ Form::label('name', 'Your name and surname:') }}
		{{ Form::text('name', $user->name) }}

		{{ Form::label('email', 'Your email:') }}
		{{ Form::email('email', $user->email) }}

		{{ Form::label('password', 'Enter a password:') }}
		{{ Form::password('password') }}

		{{ Form::hidden('id', $user->id ) }}
		<div>
			{{ Form::submit('Edit', array('class' => 'btn btn-success')) }}
			{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
		</div>

	{{ Form::close() }}
@endsection