@layout('master')

@section('container')
	<h3>Create a New User</h3>


	{{ Form::open('users/') }}
		{{ Form::label('name', 'Your name and surname:') }}
		{{ Form::text('name', $old_inputs ? $old_inputs['name'] : '') }}
		<div class="control-group{{ $errors->has('name') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('name') }}</p>
		</div>

		{{ Form::label('email', 'Your email:') }}
		{{ Form::email('email', $old_inputs ? $old_inputs['email'] : '' ) }}
		<div class="control-group{{ $errors->has('email') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('email') }}</p>
		</div>

		{{ Form::label('password', 'Enter a password:') }}
		{{ Form::password('password') }}
		<div class="control-group{{ $errors->has('password') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('password') }}</p>
		</div>



		<div>
			{{ Form::submit('Create', array('class' => 'btn btn-success')) }}
			{{ HTML::link_to_route('users', 'Cancel', '', array('class' => 'btn btn-warning') ) }}
		</div>

	{{ Form::close() }}
@endsection