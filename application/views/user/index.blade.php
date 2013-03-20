@layout('master')

@section('heading')
	<h3>Users</h3>
@endsection

@section('container')
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<td>User name</td>
				<td>Email</td>
				<td>Actions</td>
			</tr>
		</thead>

		<tbody>
			@foreach ( $users as $user )

				<tr>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>
						<a href="/users/{{ $user->id }}/edit" class="btn btn-warning">
							<i class="icon-pencil icon-white"></i>
							Edit
						</a>

						<a href="/users/{{ $user->id }}/remove" class="btn btn-danger">
							<i class="icon-remove icon-white"></i>
							Remove
						</a>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

	{{ HTML::link_to_route( 'new_user', 'New User', '', array('class' => 'btn') )}}
@endsection