@layout('master')


@section('heading')
	<h2>Add a new payment</h2>
@endsection

@section('container')
	<?php
		/* */
		if ( !count($jobs) )
			$job_array = array();
		else
		{
			foreach ($jobs as $job) {
				$job_array[$job->id] = $job->name;
			}
		}

		if ( !count($methods) )
			$method_array = array();
		else
		{
			foreach ($methods as $method) {
				$method_array[$method->id] = $method->name;
			}
		}

		if ( !count($accounts) )
			$account_array = array();
		else
		{
			foreach ($accounts as $account) {
				$account_array[$account->id] = $account->name;
			}
		}
	?>

	{{ Form::open('/payments') }}

		{{ Form::label('concept', 'Concept') }}
		{{ Form::text('concept', Input::old('concept')) }}
		<div class="control-group{{ $errors->has('concept') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('concept') }}</p>
		</div>
		{{ Form::label('amount', 'Amount') }}
		{{ Form::text('amount') }} <span class="currency">€</span>
		<div class="control-group{{ $errors->has('amount') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('amount') }}</p>
		</div>		
		{{ Form::label('ispaid', 'Already paid?') }}
		{{ Form::checkbox('ispaid') }}
		<div class="paymentdate" id="paymentdate">
			{{ Form::label('paymentdate', 'Payment date', array('class' => 'topmargin')) }}
			<div class="input-append date" id="dp3" data-date="{{ date("d/m/Y") }}" data-date-format="dd/mm/yyyy">
				{{ Form::text('deadline', '', array("class" => "span2 big", "id" => "dp1") ) }}
			<span class="add-on"><i class="icon-calendar"></i></span>
			</div>
		</div>
		{{ Form::label('job', 'Belongs to which job?', array('class' => 'topmargin')) }}
		{{ Form::select('job', $job_array, Input::old('job') ) }}
		{{ Form::label('method', 'Payment method' ) }}
		{{ Form::select('method',  $method_array, Input::old('method') ) }}
		{{ Form::label('account', 'Account') }}
		{{ Form::select('account', $account_array, Input::old('account') ) }}
		<div>
			{{ Form::submit('Create', array('class' => 'btn btn-success')) }}
		</div>
	{{ Form::close() }}


@endsection
