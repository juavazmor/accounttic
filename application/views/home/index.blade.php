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
				@foreach($payments as $payment)
					<tr>
						<td>{{ $payment->job->client->id }} </td>
						<td>{{ $payment->concept }} </td>
						<td>{{ $payment->amount }} </td>
						<td>{{ $payment->is_paid }} </td>
						<td></td>
						<td>{{ $payment->account()->find($payment->id)->first()->name }} </td>
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

