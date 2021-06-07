@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-9 col-md-12 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tracking</div>
							<table class="dashboard-table table-tracking">
								<thead>
									<tr>
										<th>No</th>
										<th>From Url</th>
										<th>To Url</th>
										<th>Product Title</th>
										<th>Product Price</th>
										<th>Product Qty</th>
									</tr>
								</thead>
								<tbody>
									@foreach($trackings as $tracking)
									<tr>
										<td>{{ ++$i }}</td>
										<td>{{ $tracking->source_url }}</td>
										<td>{{ $tracking->product_title }}</td>
										<td>{{ $tracking->target_url }}</td>
										<td>{{ $tracking->product_price }}</td>
										<td>{{ $tracking->product_qty }}</td>
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