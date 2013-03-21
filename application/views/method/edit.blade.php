@layout('master')

@section('heading')
	<h2>Edit Payment Method</h2>
@endsection

@section('container')

	{{ Form::open('/methods/' . $method->id, 'PUT') }}
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', $method->name) }}
		<div class="control-group{{ $errors->has('name') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('name') }}</p>
		</div>
		<div>
			{{ Form::submit('Edit', array('class' => 'btn btn-success'))}}
			{{ HTML::link_to_route('methods', 'Cancel', '', array('class' => 'btn btn-warning'))}}
		</div>
	{{ Form::close() }}

@endsection