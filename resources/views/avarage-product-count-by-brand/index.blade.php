@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-9 col-md-12 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Product Click Count By Brand</div>
							<table class="dashboard-table">
								<thead>
									<tr>
										<th>Brand Title</th>
										<th>Avarage Product Click Count</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$brand_title = [];
									?>
									@foreach($brands as $brand)
									@if(!in_array($brand->brand_title, $brand_title))
									<?php $brand_title[] =$brand->brand_title; ?>
									<tr>
										<td>{{ $brand->brand_title }}</td>
										<td>{{ $brand->avarage_product_count * 100 }}%</td>
									</tr>
									@endif
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