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
				<!-- <tr class="success">
					<td>1.230</td>
					<td>RRSS Febrero</td>
					<td>50</td>
					<td>Sí</td>
					<td>Directo</td>
					<td>Dani Benítez</td>
					<td>19/03/2013</td>
				</tr>
				<tr class="">
					<td>1.230</td>
					<td>RRSS Febrero</td>
					<td>50</td>
					<td>Sí</td>
					<td>Directo</td>
					<td>Dani Benítez</td>
					<td>19/03/2013</td>
				</tr>		
				<tr class="">
					<td>1.230</td>
					<td>RRSS Febrero</td>
					<td>50</td>
					<td>Sí</td>
					<td>Directo</td>
					<td>Dani Benítez</td>
					<td>19/03/2013</td>
				</tr>				<tr class="">
					<td>1.230</td>
					<td>RRSS Febrero</td>
					<td>50</td>
					<td>Sí</td>
					<td>Directo</td>
					<td>Dani Benítez</td>
					<td>19/03/2013</td>
				</tr>	 -->			
			</tbody>
		</table>
	@endsection

