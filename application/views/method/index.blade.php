@layout('master')

@section('heading')
	<h2>Payment methods</h2>
@endsection

@section('container')
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<td width="10%">#</td>
				<td>Name</td>
				<td width="25%">Actions</td>
			</tr>
		</thead>
		<tbody>
			<?php $n = 0; ?>
		@foreach($methods as $method)
		<?php
			$n++;
		?>
			<tr>
				<td>{{ $n }}</td>
				<td>{{ $method->name }}</td>
				<td><a href="/methods/{{ $method->id }}/edit" class="btn btn-warning"><i class="icon-pencil icon-white"></i>Edit</a> <a href="/methods/{{ $method->id }}/remove" class="btn btn-danger"><i class="icon-remove icon-white"></i>Remove</a></td>
			</tr>
		@endforeach
		</tbody>
	</table>
		{{ HTML::link_to_route('new_method', 'New method', '', array('class' => 'btn btn-success')) }}
@endsection