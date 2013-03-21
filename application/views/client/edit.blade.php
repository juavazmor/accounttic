@layout('master')

@section('heading')
	<h3>Edit the Client</h3>
@endsection

@section('container')
	{{ Form::open('clients/' . $client->id, 'PUT') }}

		{{ Form::label('name', 'Client\'s name:') }}
		{{ Form::text('name', $client->name) }}
		<div class="control-group error">
			<p class=control-label>{{ $errors->first('name') }}</p>
		</div>

		{{ Form::label('email', 'Client\'s email:') }}
		{{ Form::email('email', $client->email) }}
		<div class="control-group error">
			<p class=control-label>{{ $errors->first('email') }}</p>
		</div>

		{{ Form::label('phone', 'Client\'s phone:') }}
		{{ Form::text('phone', $client->phone) }}
		<div class="control-group error">
			<p class=control-label>{{ $errors->first('phone') }}</p>
		</div>

		{{ Form::hidden('id', $client->id ) }}
		<div>
			{{ Form::submit('Edit', array('class' => 'btn btn-success')) }}
			{{ HTML::link_to_route('clients', 'Cancel', '', array('class' => 'btn btn-warning') ) }}
		</div>

	{{ Form::close() }}
@endsection