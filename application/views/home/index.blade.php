@layout('master')
	
	@section('container')
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<td>Client</td>
					<td>Concept</td>
					<td>Amount</td>
					<td>Payment Method</td>
					<td>Account</td>
					<td>Date</td>
					<td>Actions</td>
				</tr>
			</thead>
			<tbody>
			<?php
				$sum = 0;
			?>
				@foreach ( $payments as $payment )

				
					<?php
						$sum += $payment->amount;
						$is_paid = ($payment->is_paid == 0) 
							? '' 
							: 'success';

						$cut = explode(" ", $payment->payment_date);
						if ($cut[0] == "0000-00-00") {
							$date_format = '-';
						} else {						
							$date = new DateTime($payment->payment_date);
							$date_format = $date->format('d/m/Y');
						}
						

					?>
					<tr class="{{ $is_paid }}">
						<td >{{ $payment->job->client->name }} </td>
						<td>{{ $payment->concept }} </td>
						<td class="right">{{ number_format($payment->amount, 2, ',', '.') }} </td>
						<td>{{ $payment->method->name }}</td>
						<td>{{ $payment->account->name }}</td>
						<td>{{ $date_format }}</td>
						<td><a href="/payments/{{ $payment->id }}/edit"><i class="icon-pencil"></i></a><a href="/payments/{{ $payment->id }}/remove" class="danger"><i class="icon-remove"></i></a></td>
					</tr>

				@endforeach		
			</tbody>
			<tfoot>
				<tr>
					<td></td>
					<td></td>
					<td class="right">{{ number_format($sum, 2, ',', '.') }}</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tfoot>
		</table>
		<div class="buttons">
			<a href="/payments/new" class="btn btn-success" class="create"><i class="icon-plus icon-white"></i>new payment</a>
		</div>
	@endsection

