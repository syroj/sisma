@extends('layouts.app2')
@section('content')
@include('layouts.sidebar')
<div class="main">
	<div class="col-md-6 offset-3">
		<div class="card" style="margin-top: 15px;">
			<div class="card-header">
				<strong>Edit Role</strong>
			</div>
			<div class="card-body">
			
				<form class="form" method="POST" action="{{url('saveeditstatus')}}/{{$data->id}}">
						{{csrf_field()}}
					<table class="table table-hover table-bordered">
						<thead>
							<th colspan="2" style="text-align: center;">Edit Data Role</th>
						</thead>
						<tbody>
							<tr>
								<td>Kode</td>
								<td><input type="text" name="kode_status" class="form-control" placeholder="Kode Status" value="{{$data->kode_status}}"></td>
							</tr>
							<tr>
								<td>Status</td>
								<td><input type="text" name="status" class="form-control" placeholder="Status" value="{{$data->status}}"></td>
							</tr>
							<tr>
								<td colspan="2">
									<button class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
								</td>
							</tr>
						</tbody>
					</table>
				</form>

			</div>
		</div>
	</div>
</div>
@endsection