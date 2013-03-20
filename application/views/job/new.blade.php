@layout('master')

@section('heading')
	<h2>Add a job</h2>
@endsection

@section('container')
	{{ Form::open('/jobs/') }}
		{{ Form::label('name', 'Name of the job') }}
		{{ Form::text('name') }}
		{{ Form::label('client', 'Client') }}
		{{ Form::select('cliente', array()) }}
		{{ Form::label('amount', 'Amount of the job') }}
		{{ Form::text('amount') }} €
		{{ Form::label('deadline', 'Deadline') }}
		<div class="input-append date" id="dp3" data-date-format="dd-mm-yyyy">
		{{ Form::text('deadline', '', array("class" => "span2 big", "id" => "dp1") ) }}
		<span class="add-on"><i class="icon-calendar"></i></span>
		</div>
		{{ Form::label('finished', 'Finished?')}}
		{{ Form::checkbox('finished') }}
		<div class="topmargin">
			{{ Form::submit('Create', array("class" => "btn btn-success")) }}
		</div>
		
	{{ Form::close() }}


@endsection