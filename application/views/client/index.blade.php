@layout('master')

@section('heading')
	<h3>Clients</h3>
@endsection

@section('container')
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<td>Client number</td>
				<td>Client name</td>
				<td>Email</td>
				<td>Phone</td>
				<td>Actions</td>
			</tr>
		</thead>

		<tbody>
			@foreach ( $clients as $client )

				<tr>
					<td>{{ $client->id }}</td>
					<td>{{ $client->name }}</td>
					<td>{{ $client->email }}</td>
					<td>{{ $client->phone }}</td>
					<td>
						<a href="/clients/{{ $client->id }}/edit" class="btn btn-warning">
							<i class="icon-pencil icon-white"></i>
							Edit
						</a>

						<a href="/clients/{{ $client->id }}/remove" class="btn btn-danger">
							<i class="icon-remove icon-white"></i>
							Remove
						</a>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

	{{ HTML::link_to_route( 'new_client', 'New client', '', array('class' => 'btn btn-success') )}}
@endsection