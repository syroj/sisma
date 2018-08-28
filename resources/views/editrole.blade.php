@extends('layouts.app2')
@section('content')
<div class="main">
	<div class="col-md-6 offset-3">
		<div class="card" style="margin-top: 15px;">
			<div class="card-header">
				<strong>Edit Role</strong>
			</div>
			<div class="card-body">
			
				<form class="form" method="POST" action="{{url('saveeditrole')}}/{{$data->id}}">
						{{csrf_field()}}
					<table class="table table-hover table-bordered">
						<thead>
							<th colspan="2" style="text-align: center;">Edit Data Role</th>
						</thead>
						<tbody>
							<tr>
								<td>Kode</td>
								<td><input type="text" name="kode_role" class="form-control" placeholder="Kode Role" value="{{$data->kode_role}}"></td>
							</tr>
							<tr>
								<td>Role</td>
								<td><input type="text" name="role" class="form-control" placeholder="Role" value="{{$data->role}}"></td>
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