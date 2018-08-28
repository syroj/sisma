@extends('layouts.app2')
@section('content')
<div class="container">
	<div class="row justify-content-center" style="padding-top: 15px;">
		<div class="card">
			<div class="card-header">
				<strong>Edit Data Kurikulum</strong>
			</div>
			<div class="card-body">
				<div class="col col-md-4">
					<form class="form form-inline" action="{{url('savekurikulum')}}/{{$data->id}}" method="POST">
						{{csrf_field()}}
						<table class="table table table-bordered">
							<tr>
								<td>Kurikulum</td>
								<td><input type="text" name="nama" class="form-control" placeholder="Nama Kurikulum" value="{{$data->nama}}"></td>
							</tr>
							<tr>
								<td>Deskripsi</td>
								<td>
									<textarea class="form-control" name="deskripsi">{{$data->deskripsi}}</textarea>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection