@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-9 col-md-12 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Email List</div>
							<table class="dashboard-table table-store-count">
								<thead>
									<tr>
										<th>No</th>
										<th>Store Url</th>
										<th>User Email</th>
									</tr>
								</thead>
								<tbody>
									@foreach($emails as $email)
									<tr>
										<td>{{ ++$i }}</td>
										<td>{{ $email->store->url }}</td>
										<td>{{ $email->user_email }}</td>
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