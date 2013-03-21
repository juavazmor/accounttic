@layout('master')

@section('heading')
	<h2>Add a Payment Method</h2>
@endsection

@section('container')
	{{ Form::open('/methods', 'POST') }}
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', $old_inputs ? $old_inputs['name'] : '') }}
		<div class="control-group{{ $errors->has('name') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('name') }}</p>
		</div>
		<div>
			{{ Form::submit('Create', array('class' => 'btn btn-success'))}}
		</div>
	{{ Form::close() }}
@endsection