@layout('master')


@section('heading')
	<h2>Edit payment</h2>
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

		$date = new DateTime($payment->payment_date);
	?>

	{{ Form::open('/payments/' . $payment->id, 'PUT') }}

		{{ Form::label('concept', 'Concept') }}
		{{ Form::text('concept', $payment->concept) }}
		<div class="control-group{{ $errors->has('concept') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('concept') }}</p>
		</div>
		{{ Form::label('amount', 'Amount') }}
		{{ Form::text('amount', $payment->amount) }} <span class="currency">€</span>
		<div class="control-group{{ $errors->has('amount') ? ' error' : '' }}">
			<p class=control-label>{{ $errors->first('amount') }}</p>
		</div>
		{{ Form::label('ispaid', 'Already paid?') }}
		{{ Form::checkbox('ispaid', 1, ($payment->is_paid == 1) ? true : false) }}
		<div class="paymentdate {{ ($payment->is_paid == 1) ? 'paymentdateshow' : ''  }}" id="paymentdate">
			{{ Form::label('paymentdate', 'Payment date', array('class' => 'topmargin')) }}
			<div class="input-append date" id="dp3" data-date="{{ date("d/m/Y") }}" data-date-format="dd/mm/yyyy">
				{{ Form::text('deadline', $date->format("m/d/Y"), array("class" => "span2 big", "id" => "dp1") ) }}
			<span class="add-on"><i class="icon-calendar"></i></span>
			</div>
		</div>
		{{ Form::label('job', 'Belongs to which job?', array('class' => 'topmargin')) }}
		{{ Form::select('job', $job_array, $payment->job_id ) }}
		{{ Form::label('method', 'Payment method' ) }}
		{{ Form::select('method',  $method_array, $payment->payment_method_id ) }}
		{{ Form::label('account', 'Account') }}
		{{ Form::select('account', $account_array, $payment->account_id ) }}
		<div>
			{{ Form::submit('Edit', array('class' => 'btn btn-success')) }}
			{{ HTML::link_to_route('payments', 'Cancel', '', array('class' => 'btn btn-warning')) }}
		</div>
	{{ Form::close() }}


@endsection
