@layout('master')

@section('heading')
	<h3>Edit the Account</h3>
@endsection

@section('container')
	{{ Form::open('accounts/' . $account->id, 'PUT') }}

		{{ Form::label('name', 'Account name:') }}
		{{ Form::text('name', $account->name) }}
		<div class="control-group error">
			<p class=control-label>{{ $errors->first('name') }}</p>
		</div>

		{{ Form::hidden('id', $account->id ) }}
		<div>
			{{ Form::submit('Edit', array('class' => 'btn btn-success')) }}
			{{ HTML::link_to_route('accounts', 'Cancel', '', array('class' => 'btn btn-warning') ) }}
		</div>

	{{ Form::close() }}
@endsection