@extends('layouts.app1')
@section('content')
<div class="content">
<div class="container-fluid">
	<div class="box">
		<div class="box-body">
			<form class="form" method="POST" action="{{url('edit_staf')}}">
				{{csrf_field()}}
				<table class="table table-bordered">
					<th colspan="6" style="text-align: center;">Data PRIBADI</th>
					<tr>
						<td>
							Nama Lengkap
						</td>
						<td>
							<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{$staf->nama}}" required>
						</td>
						<td>
							Gelar
						</td>
						<td>
							<input type="text" name="gelar" class="form-control" placeholder="Gelar" required>
						</td>
						<td>
							NIP
						</td>
						<td>
							<input type="text" name="nip" class="form-control" placeholder="NIP" value="{{$staf->nip}}" required>
						</td>
					</tr>
					<tr>
						<td>
							Tempat Lahir
						</td>
						<td>
							<input type="text" name="tmp_lahir" class="form-control" placeholder="Tempat Lahir" value="{{$staf->tmp_lahir}}" required>
						</td>
						<td>
							Tanggal Lahir
						</td>
						<td>
							<input type="text" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{$staf->tgl_lahir}}" required>
						</td>
						<td>
							Gender
						</td>
						<td>
							<select class="form-control" name="gender" required="true">
								<option value="{{$staf->gender}}">{{$staf->gender}}</option>
								<option value="Pria">Pria</option>
								<option value="Wanita">Wanita</option>
							</select>
						</td>
					</tr>
					<th colspan="6" style="text-align: center;">KONTAK</th>
					<tr>
						<td>
							Alamat
						</td>
						<td colspan="2">
							<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{$staf->alamat}}" required>
						</td>
						<td>
							Email
						</td>
						<td colspan="2">
							<input type="text" name="email" class="form-control" placeholder="Email Aktif" value="{{$staf->user->email}}" required>
						</td>
					</tr>
					<th colspan="6" style="text-align: center;">PENDIDIKAN</th>
					<tr>
						<td>
							Pendidikan Terakhir
						</td>
						<td colspan="2">
							<input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan" value="{{$staf->pendidikan}}" required>
						</td>
						<td>
							Almamater
						</td>
						<td colspan="2">
							<input type="text" name="almamater" class="form-control" placeholder="Almamater" value="{{$staf->almamater}}" required>
						</td>
					</tr>
					<tr>
						<td colspan="6">
							<button type="submit" class="btn btn-default pull-right"><span><i class="fa fa-save"></i></span> Simpan</button>
						</td>
					</tr>
				</table>
			</form>	
		</div>
	</div>
</div>
</div>
@endsection