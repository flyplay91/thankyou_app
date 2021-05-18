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
							<table class="dashboard-table">
								<thead>
									<tr>
										<th>Store Url</th>
										<th>Total Click Count</th>
										<th>Click Count per Day</th>
									</tr>
								</thead>
								<tbody>
									@foreach($stores as $store)
									<tr>
										<td>{{ $store->url }}</td>
										<td>{{ $store->total_click_count }}</td>
										<td>{{ $store->daily_click_count }}</td>
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