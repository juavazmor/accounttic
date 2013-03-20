@layout('master')

@section('container')
	<h3>Create a New Account</h3>


	{{ Form::open('accounts/') }}
		{{ Form::label('name', 'Account name:') }}
		{{ Form::text('name', $old_inputs ? $old_inputs['name'] : '') }}
		<div class="control-group{{ $errors->has('name') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('name') }}</p>
		</div>

		<div>
			{{ Form::submit('Create', array('class' => 'btn btn-success')) }}
			{{ HTML::link_to_route('accounts', 'Cancel', '', array('class' => 'btn btn-warning') ) }}
		</div>

	{{ Form::close() }}
@endsection