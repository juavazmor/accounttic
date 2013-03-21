@layout('master')

@section('container')
	<h3>Create a New Client</h3>


	{{ Form::open('clients/') }}
		{{ Form::label('name', 'Client\'s name:') }}
		{{ Form::text('name', $old_inputs ? $old_inputs['name'] : '') }}
		<div class="control-group{{ $errors->has('name') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('name') }}</p>
		</div>

		{{ Form::label('email', 'Client\'s email:') }}
		{{ Form::email('email', $old_inputs ? $old_inputs['email'] : '' ) }}
		<div class="control-group{{ $errors->has('email') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('email') }}</p>
		</div>

		{{ Form::label('phone', 'Client\'s phone:') }}
		{{ Form::text('phone', $old_inputs ? $old_inputs['phone'] : '' ) }}
		<div class="control-group{{ $errors->has('phone') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('phone') }}</p>
		</div>



		<div>
			{{ Form::submit('Create', array('class' => 'btn btn-success')) }}
			{{ HTML::link_to_route('clients', 'Cancel', '', array('class' => 'btn btn-warning') ) }}
		</div>

	{{ Form::close() }}
@endsection