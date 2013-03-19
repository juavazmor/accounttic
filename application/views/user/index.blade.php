@layout('master')

@section('container')
	<h3>Users</h3>

	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<td>User name</td>
				<td>Email</td>
				<td>Edit</td>
			</tr>
		</thead>

		<tbody>
			@foreach ( $users as $user )

				<tr>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ HTML::link_to_route('edit_user', 'Edit', $user->id)}}</td>
				</tr>

			@endforeach
		</tbody>
	</table>

	{{ HTML::link_to_route( 'new_user', 'New User', '', array('class' => 'btn') )}}
@endsection