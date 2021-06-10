@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-9 col-md-12 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Visitor Counts</div>
							<table class="dashboard-table table-responsive table-store-count">
								<thead>
									<tr>
										<th>No</th>
										<th>Store Url</th>
										<th>Total Visitors</th>
										<th>Unique Visitors</th>
									</tr>
								</thead>
								<tbody>
									@foreach($stores as $store)
									<tr>
										<td>{{ ++$i }}</td>
										<td>{{ $store->url }}</td>
										<td>{{ $store->total_visitor_count }}</td>
										<td>{{ $store->unique_visitor_count }}</td>
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