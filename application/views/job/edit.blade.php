@layout('master')


@section('heading')
	<h2>Edit job</h2>
@endsection

@section('container')
	<?php
		foreach ($clients as $client) 
		{
			$clients_array[$client->id] = $client->name;
		}

		$date = new DateTime($job->deadline);

	?>

	{{ Form::open('/jobs/' . $job->id, 'PUT') }}
		{{ Form::label('name', 'Name of the job') }}
		{{ Form::text('name', $job->name) }}
		<div class="control-group{{ $errors->has('name') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('name') }}</p>
		</div>
		{{ Form::label('client', 'Client') }}
		{{ Form::select('client', $clients_array, $job->client_id) }}
		{{ Form::label('amount', 'Amount of the job') }}
		{{ Form::text('amount', $job->amount) }}<span class="currency">€</span>
		<div class="control-group{{ $errors->has('amount') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('amount') }}</p>
		</div>
		{{ Form::label('deadline', 'Deadline') }}
		<div class="input-append date" id="dp3" data-date="{{ date("d/m/Y") }}" data-date-format="dd/mm/yyyy">
			{{ Form::text('deadline', $date->format("m/d/Y"), array("class" => "span2 big", "id" => "dp1") ) }}
		<span class="add-on"><i class="icon-calendar"></i></span>
		</div>
		{{ Form::label('finished', 'Finished?')}}
		{{ Form::checkbox('finished', 1, ($job->finished == 1) ? true : false ) }}
		<div class="topmargin">
			{{ Form::submit('Edit', array("class" => "btn btn-success")) }}
			{{ HTML::link_to_route('jobs', 'Cancel', '', array('class' => 'btn btn-warning') ) }}
		</div>
		
	{{ Form::close() }}
@endsection