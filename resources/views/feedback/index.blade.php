@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-9 col-md-12 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Feedback Counts</div>
							<table class="dashboard-table">
								<thead>
									<tr>
										<th>No</th>
										<th>Store Url</th>
										<th>Rating 1</th>
										<th>Rating 2</th>
										<th>Rating 3</th>
										<th>Rating 4</th>
										<th>Rating 5</th>
									</tr>
								</thead>
								<tbody>
									@foreach($stores as $store)
									<tr>
										<td>{{ ++$i }}</td>
										<td>{{ $store->url }}</td>
										<td>{{ $store->feedback_rating_1 }}</td>
										<td>{{ $store->feedback_rating_2 }}</td>
										<td>{{ $store->feedback_rating_3 }}</td>
										<td>{{ $store->feedback_rating_4 }}</td>
										<td>{{ $store->feedback_rating_5 }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection