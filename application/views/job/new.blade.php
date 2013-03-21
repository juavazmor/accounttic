@layout('master')

@section('heading')
	<h2>Add a job</h2>
@endsection

@section('container')

	<?php
		if ( count($clients) == 0 ) {
			$clients_array = array();
		} else {
			foreach ($clients as $client)
				$clients_array[$client->id] = $client->name;
		}

	?>
	{{ Form::open('/jobs/') }}
		{{ Form::label('name', 'Name of the job') }}
		{{ Form::text('name', $old_inputs ? $old_inputs['name'] : '') }}
		<div class="control-group{{ $errors->has('name') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('name') }}</p>
		</div>

		{{ Form::label('client', 'Client') }}
		{{ Form::select('client', $clients_array) }}
		{{ HTML::link_to_route('new_client', '+', '', array('class' => 'btn')) }}
		<div class="control-group{{ $errors->has('client_id') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('client_id') }}</p>
		</div>

		{{ Form::label('amount', 'Amount of the job') }}
		{{ Form::text('amount', $old_inputs ? $old_inputs['amount'] : '') }}<span class="currency">€</span>
		<div class="control-group{{ $errors->has('amount') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('amount') }}</p>
		</div>

		{{ Form::label('deadline', 'Deadline') }}
		<div class="input-append date" id="dp3" data-date="{{ date("d/m/Y") }}" data-date-format="dd/mm/yyyy">
			{{ Form::text('deadline', $old_inputs ? $old_inputs['deadline'] : '', array("class" => "span2 big", "id" => "dp1") ) }}
		<span class="add-on"><i class="icon-calendar"></i></span>
		</div>
		<div class="control-group{{ $errors->has('deadline') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('deadline') }}</p>
		</div>

		{{ Form::label('finished', 'Finished?')}}
		{{ Form::checkbox('finished') }}
		<div class="topmargin">
			{{ Form::submit('Create', array("class" => "btn btn-success")) }}
		</div>

	{{ Form::close() }}


@endsection