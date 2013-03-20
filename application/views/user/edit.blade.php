@layout('master')

@section('heading')
	<h3>Edit the User</h3>
@endsection

@section('container')
	{{ Form::open('users/' . $user->id, 'PUT') }}

		{{ Form::label('name', 'Your name and surname:') }}
		{{ Form::text('name', $user->name) }}
		<div class="control-group error">
			<p class=control-label>{{ $errors->first('name') }}</p>
		</div>

		{{ Form::label('email', 'Your email:') }}
		{{ Form::email('email', $user->email) }}
		<div class="control-group error">
			<p class=control-label>{{ $errors->first('email') }}</p>
		</div>

		{{ Form::label('password', 'Enter a password:') }}
		{{ Form::password('password') }}
		<div class="control-group error">
			<p class=control-label>{{ $errors->first('password') }}</p>
		</div>

		{{ Form::hidden('id', $user->id ) }}
		<div>
			{{ Form::submit('Edit', array('class' => 'btn btn-success')) }}
			{{ HTML::link_to_route('users', 'Cancel', '', array('class' => 'btn btn-warning') ) }}
		</div>

	{{ Form::close() }}
@endsection