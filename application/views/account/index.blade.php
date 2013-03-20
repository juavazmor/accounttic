@layout('master')

@section('heading')
	<h3>Accounts</h3>
@endsection

@section('container')
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<td>Account name</td>
				<td>Actions</td>
			</tr>
		</thead>

		<tbody>
			@foreach ( $accounts as $account )

				<tr>
					<td>{{ $account->name }}</td>
					<td>
						<a href="/accounts/{{ $account->id }}/edit" class="btn btn-warning">
							<i class="icon-pencil icon-white"></i>
							Edit
						</a>

						<a href="/accounts/{{ $account->id }}/remove" class="btn btn-danger">
							<i class="icon-remove icon-white"></i>
							Remove
						</a>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

	{{ HTML::link_to_route( 'new_account', 'New Account', '', array('class' => 'btn btn-success') )}}
@endsection