@layout('master')

@section('heading')
	<h2>Jobs</h2>
@endsection

@section('container')
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<td>Client Number</td>
				<td>Client Name</td>
				<td>Job</td>
				<td>Amount</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
			@foreach($jobs as $job)
				<?php $sum += $job->amount; ?>
			<tr>
				<td>{{ $job->client->id }}</td>
				<td>{{ $job->client->name }} </td>
				<td>{{ $job->name }}</td>
				<td>{{ number_format($job->amount, 2, ',', '.')  }}</td>
				<td><a href="/jobs/{{ $job->id }}/edit" class="btn btn-warning"><i class="icon-pencil icon-white"></i>Edit</a> <a href="/jobs/{{ $job->id }}/remove" class="btn btn-danger"><i class="icon-remove icon-white"></i>Remove</a></td>
			</tr>
			@endforeach

		</tbody>
		<tfoot>			
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>{{ number_format($sum, 2, ',', '.') }}</td>
				<td></td>
			</tr>
		</tfoot>
	</table>
	<div class="buttons">
		<a href="/jobs/new" class="btn btn-success"><i class="icon-plus icon-white"></i>New job</a>
	</div>
@endsection