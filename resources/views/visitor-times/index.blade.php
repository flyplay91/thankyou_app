@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-10 col-md-12 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Visitor Times</div>
							<table class="dashboard-table table-responsive table-store-time">
								<thead>
									<tr>
										<th>No</th>
										<th>Store Url</th>
										<th>Avarage Store Time per Day</th>
										<!-- <th>Avarage Product Time per Day</th> -->
									</tr>
								</thead>
								<tbody>
									@foreach($stores as $store)
									<tr>
										<td>{{ ++$i }}</td>
										<td>{{ $store->url }}</td>
										<td>{{ gmdate("H:i:s", $store->avarage_store_time) }}</td>
										<!-- <td>{{ gmdate("H:i:s", $store->avarage_product_time) }}</td> -->
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