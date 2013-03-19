@layout('master')
	
	@section('container')
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<td>Client number</td>
					<td>Concept</td>
					<td>Amount</td>
					<td>Is paid</td>
					<td>Payment Method</td>
					<td>Account</td>
					<td>Date</td>
				</tr>
			</thead>
			<tbody>
				@foreach ( $payments as $payment )
					<?php
						$is_paid = ($payment->is_paid == 0) 
							? 'No' 
							: 'Sí';

						$date = new DateTime($payment->date);

					?>
					<tr>
						<td class="right">{{ $payment->job->client->id }} </td>
						<td>{{ $payment->concept }} </td>
						<td class="right">{{ $payment->amount }} </td>
						<td>{{ $is_paid }} </td>
						<td>{{ $payment->method->name }}</td>
						<td>{{ $payment->account->name }}</td>
						<td>{{ $date->format('d/m/Y - H:i:s') }}</td>
					</tr>

				@endforeach		
			</tbody>
		</table>
		<div class="buttons">
			<a href="#" class="btn btn-success" class="create"><i class="icon-plus icon-white"></i>new payment</a>
		</div>
	@endsection

