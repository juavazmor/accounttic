@layout('master')

@section('heading')
	<h2>Costs</h2>
@endsection

@section('container')
	<table width="100%" class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<td>#</td>
				<td>Concept</td>
				<td>Amount</td>
				<td>File</td>
				<td>Paid by</td>
				<td>Actions</td>
			</tr>
		</thead>
		<tbody>
			<?php 
				$n = 0;
				$total_cost = 0;
				$upload_path = Config::get('application.upload_path');
				$upload_path = str_replace('public', '', $upload_path);
			 ?>
			@foreach( $costs as $cost )
				<?php 
					$n++;
					$total_cost += $cost->amount;
					$file = ( !empty( $cost->file) ) ? '<a href="' . $upload_path . '/' . $cost->file . '">' . $cost->file . '</a>' : '-';
				?>
			<tr>
				<td>{{ $n }}</td>
				<td>{{ $cost->concept }}</td>
				<td>{{ number_format( $cost->amount, 2, ',', '.' ) }}</td>
				<td>{{ $file }}</td>
				<td>{{ $cost->user->name }}</td>
				<td>
					<a href="/costs/{{ $cost->id }}/edit"><i class="icon-pencil"></i></a>
					<a href="/costs/{{ $cost->id }}/remove" class="danger"><i class="icon-remove"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td></td>
				<td></td>
				<td>{{ number_format( $total_cost, 2, ',', '.') }}</td>
				<td></td>
				<td></td>
			</tr>
		</tfoot>
	</table>
	<div class="buttons">
		<a href="/costs/new" class="btn btn-success" class="create"><i class="icon-plus icon-white"></i>new cost</a>
	</div>
@endsection