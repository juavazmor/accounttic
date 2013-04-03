@layout('master')

@section('heading')
	<h2>Add cost</h2>
@endsection

@section('container')

<?php
	if ( count($users) > 0 ) {

		foreach ($users as $user) {
			$user_array[$user->id] = $user->name;
		}

	} else
		$users = array();

?>
	
	{{ Form::open('/costs/', 'POST', array('enctype' => 'multipart/form-data')) }}
		
		{{ Form::label('concept', 'Concept') }}
		{{ Form::text('concept') }}

		<div class="control-group{{ $errors->has('concept') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('concept') }}</p>
		</div>

		{{ Form::label('amount', 'Amount') }}
		{{ Form::text('amount') }}

		<div class="control-group{{ $errors->has('concept') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('amount') }}</p>
		</div>

		{{ Form::label('paidby', 'Paid by') }}
		{{ Form::select('paidby', $user_array )}}

		<div class="">
			{{ Form::label('paymentdate', 'Payment date', array('class' => 'topmargin')) }}
			<div class="input-append date" id="dp3" data-date="{{ date("d/m/Y") }}" data-date-format="dd/mm/yyyy">
				{{ Form::text('deadline', '', array("class" => "span2 big", "id" => "dp1") ) }}
				<span class="add-on"><i class="icon-calendar"></i></span>
			</div>

		</div>

		<div class="control-group{{ $errors->has('concept') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('paymentdate') }}</p>
		</div>
		{{ Form::label('file', 'Budget') }}
		{{ Form::file('file') }}
		<div>
			{{ Form::submit('Add cost', array('class' => 'btn btn-success')) }}
		</div>

	{{ Form::close() }}
@endsection