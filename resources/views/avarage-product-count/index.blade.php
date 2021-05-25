@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-9 col-md-12 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Product Click Count</div>
							<table class="dashboard-table">
								<thead>
									<tr>
										<th>No</th>
										<th>Store Url</th>
										<th>Brand Title</th>
										<th>Product Click Count</th>
									</tr>
								</thead>
								<tbody>
									@foreach($brands as $brand)
										<tr>
											<td>{{ ++$i }}</td>
											<td>{{ $brand->store->url }}</td>
											<td>{{ $brand->brand_title }}</td>
											<td>{{ $brand->avarage_product_count }}</td>
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