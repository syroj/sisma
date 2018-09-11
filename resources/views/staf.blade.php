@extends('layouts.app1')
@section('content')
@include('layouts.sidebar1')
<div class="content-wrapper">
	<div class="content">
		@if(session('status'))
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Alert!  {{session('status')}}   </h4>
        </div>
        @endif
		<div class="box">
			<div class="box-body">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active">
                        <a class="nav-link" data-toggle="tab" href="#staf" role="tab" aria-controls="staf"><span><i class="fa fa-vcard"></i></span> Daftar Staf</a>
                        </li>
						<li>
                        <a class="nav-link" data-toggle="tab" href="#2" role="tab"><span><i class="fa fa-edit"></i></span> Tambah Staf</a>
                        </li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane active" id="staf" role="tabpanel">
						<div class="row">
                            <div class="col-md-4 pull-right" style="padding-bottom: 1em;">
                                    <form action="{{url('cari_staf')}}" method="get" class="form">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Cari Nama atau NIS">
                                            <span class="input-group-btn">
                                                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                                </button>
                                                <a href="{{url('/home')}}" id="search-btn" class="btn btn-default btn-flat"><i class="fa fa-home"></i>
                                                </a>
                                                <a href="{{url('/staf')}}" id="search-btn" class="btn btn-default btn-flat"><i class="fa fa-arrow-left"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </form>    
                            </div>
                        </div>
						<table class="table">
							<th>No</th>
							<th>Nama</th>
							<th>NIP</th>
							<th>Email</th>
							<th>Status</th>
							<th>Sebagai</th>
							<th style="width: 150px; text-align: center;">Opsi</th>
							<?php $x=1;?>
						@if(count($stafs)>0)
						@foreach($stafs as $s)
							<tr>
								<td>{{$x++}}</td>
								<td>{{$s->nama}} </td>
								<td>{{$s->nip}} </td>
								<td>{{$s->user->email}} </td>
								<td>{{$s->status->status}} </td>
								<td>Guru</td>
								<td>
									<a href="{{url('detail/staf')}}/{{$s->id}}" class="btn btn-sm btn-default"><span><i class="fa fa-search"></i></span></a>
									<a href="{{url('edit/staf')}}/{{$s->id}}" class="btn btn-sm btn-default"><span><i class="fa fa-edit"></i></span></a>
									<a href="{{url('setting/staf')}}/{{$s->id}}" class="btn btn-sm btn-default"><span><i class="fa fa-gears"></i></span></a>
								</td>
							</tr>
						@endforeach
						@else
						<tr>
							<td colspan="7" style="text-align: center;">Belum Ada Data<br> <a href="{{url('staf')}}" class="btn btn-default"><span><i class="fa fa-arrow-left"></i></span> Kembali</a> </td>
						</tr>
						@endif
						</table>
						<div class="pagination pagination pull-right">
							{{$stafs->links()}}
						</div>
					</div>
					<div class="tab-pane" id="2" role="tabpanel">
						<form class="form" method="POST" action="{{url('tambah_staf')}}">
							{{csrf_field()}}
							<table class="table table-bordered">
								<th colspan="6" style="text-align: center;">Data PRIBADI</th>
								<tr>
									<td>
										Nama Lengkap
									</td>
									<td>
										<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
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
										<input type="text" name="nip" class="form-control" placeholder="NIP" required>
									</td>
								</tr>
								<tr>
									<td>
										Tempat Lahir
									</td>
									<td>
										<input type="text" name="tmp_lahir" class="form-control" placeholder="Tempat Lahir" required>
									</td>
									<td>
										Tanggal Lahir
									</td>
									<td>
										<input type="text" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required>
									</td>
									<td>
										Gender
									</td>
									<td>
										<select class="form-control" name="gender" required="true">
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
										<input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
									</td>
									<td>
										Email
									</td>
									<td colspan="2">
										<input type="text" name="email" class="form-control" placeholder="Email Aktif" required>
									</td>
								</tr>
								<th colspan="6" style="text-align: center;">PENDIDIKAN</th>
								<tr>
									<td>
										Pendidikan Terakhir
									</td>
									<td colspan="2">
										<input type="text" name="pendidikan" class="form-control" placeholder="Pendidikan" required>
									</td>
									<td>
										Almamater
									</td>
									<td colspan="2">
										<input type="text" name="almamater" class="form-control" placeholder="Almamater" required>
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
	</div>
</div>
@endsection