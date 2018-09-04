@extends('layouts.app2')
@section('content')
@include('layouts.sidebar')
<div class="main">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tahunajaran" role="tab" aria-controls="home">
                      <i class="fa fa-calendar"></i> Tahun Ajaran</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#Kurikulum" role="tab" aria-controls="profile">
                      <i class="fa fa-list"></i> Kurikulum</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#peminatan" role="tab" aria-controls="messages">
                      <i class="fa fa-users"></i> Jurusan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kelas" role="tab" aria-controls="messages">
                      <i class="fa fa-building"></i> Kelas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#guru" role="tab" aria-controls="messages">
                      <i class="fa fa-user-circle"></i> Guru</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#pelajaran" role="tab" aria-controls="profile">
                      <i class="fa fa-book"></i> Pelajaran</a>
                  </li>                  
                </ul>
			</div>
			<div class="card-body">
	            <div class="tab-content">
	              <div class="tab-pane active" id="tahunajaran" role="tabpanel">
	              	<form method="POST" action="{{url('add_ta')}}">
	              		{{csrf_field()}}
		              	<table class="table table-bordered">
		              		<thead class="dark">
		              			<th colspan="4">Tambah tahun ajaran</th>
		              		</thead>
		              		<tr>
		              			<td>Kurikulum</td>
		              			<td>
		              				<select class="form-control" name="kurikulum_id" required>
		              					<option>Pilih Kurikulum</option>
		              				@foreach($kurikulum as $r)
		              					<option value="{{$r->id}}">{{$r->nama}}</option>
		              				@endforeach
		              				</select>
		              			</td>
		              			<td>Nama</td>
		              			<td><input type="text" name="nama" class="form-control" placeholder="cth: 2010/2011" required></td>
		              		</tr>
		              		<tr>
		              			<td>Tanggal Mulai</td>
		              			<td><input type="text" name="tgl_mulai" placeholder="cth: 22-08-2019" class="form-control" required></td>
		              			<td>Tanggal Selesai</td>
		              			<td><input type="text" name="tgl_selesai" placeholder="cth: 22-08-2019" class="form-control" required></td>
		              		</tr>
		              		<tr>
		              			<td colspan="4">
		              				<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Tambah Tahun Ajaran</button>
		              			</td>
		              		</tr>
		              	</table>
	              	</form>
	              	<div class="row">
	              		<div class="col col-md-9">
			              	<table class="table table-bordered">
			              		<thead>
			              			<th>Tahun Ajaran</th>
			              			<th>Kurikulum</th>
			              			<th>Tgl Mulai</th>
			              			<th>Tgl Selesai</th>
			              			<th>Status</th>
			              			<th>Action</th>
			              		</thead>
				              	@if(count($ta)>0)
				              	@foreach($ta as $ta)
			              		<tbody>
			              			<td>{{$ta->nama}}</td>
			              			<td>{{$ta->kurikulum->nama}}</td>
			              			<td>{{$ta->tgl_mulai}}</td>
			              			<td>{{$ta->tgl_selesai}}</td>
			              			<td>{{$ta->status->status}}</td>
			              			<td>
			          					<a href="#" class="btn btn-primary btn-sm">Aktifkan</a>
			          					<a href="#" class="btn btn-success btn-sm">Nokaktifkan</a>
			          					<a href="#" class="btn btn-warning btn-sm">Selesai</a>
			              			</td>
			              		</tbody>
			              	@endforeach
			              	@else
			              	<td colspan="6" style="text-align: center;">Belum Ada Data Tahun Ajaran</td>
			              	@endif
			              	</table>
	              		</div>
	              		<div class="col-md-3">
	              			<table class="table table-bordered" id="ta" >
	              				<thead style="text-align: center;">
	              					<th>Smester Aktif</th>
	              				</thead>
	              				<tbody>
	          					<form class="form">
	              					<td style="text-align: center;"> 
				                        <div class="col-md-12 col-form-label">
				                        @foreach($sm as $s)
				                          <div class="form-check form-check-inline mr-1">
				                            <input class="form-check-input" id="inline-radio1" value="{{$s->id}}" name="Smester" type="radio">
				                            <label class="form-check-label" for="inline-radio1">{{$s->smester}}</label>
				                          </div>
				                          @endforeach
				                        </div>
	              					</td>
		              			</form>
	              				</tbody>
	              			</table>
	              		</div>
	              	</div>

	              </div>
	              <div class="tab-pane" id="Kurikulum" role="tabpanel">
	              	<div class="row">
	              		<?php
	              		$x=1;
	              		?>
	              		<div class="col col-8">
	              		@if(count($kurikulum)>0)
			              	<table class="table table-bordered table-sm" id="tab_kurikulum" style="width:100%;">
			              		<thead>
				              		<th>No</th>
				              		<th>Kurikulum</th>
				              		<td>Deskripsi</td>
				              		<th>Action</th>
			              		</thead>
			              		<tbody>
			              		@foreach($kurikulum as $k)
								<tr>
			              			<td>{{$x++}}</td>
			              			<td>{{$k->nama}}</td>
			              			<td>{{$k->deskripsi}}</td>
			              			<td style="width: 80px;">
		              					<a href="{{url('kurikulum.edit')}}/{{$k->id}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
		              					<a href="{{url('kurikulum.delete')}}/{{$k->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
			              			</td>
								</tr>
								@endforeach
			              		</tbody>
			              	</table>
		              	@else
		              	<h3>Belum ada data</h3>
		              	@endif	
	              		</div>
	              		<div class="col col-md-4">
			              	<form class="form form-inline" action="{{url('addkurikulum')}}" method="POST">
			              		{{csrf_field()}}
			              		<table class="table table-bordered">
			              			<tr>
			              				<td>Kurikulum</td>
			              				<td><input type="text" name="nama" class="form-control" placeholder="Nama Kurikulum" required></td>
			              			</tr>
			              			<tr>
			              				<td>Deskripsi</td>
			              				<td>
			              					<textarea class="form-control" name="deskripsi" placeholder="Deskripsi Kurikulum"></textarea>
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
	              	</hr>
	              </div>
	              <div class="tab-pane" id="pelajaran" role="tabpanel">
	              	pelaj
	              </div>
	              <div class="tab-pane" id="guru" role="tabpanel">
	              	guru
	              </div>
	              <div class="tab-pane" id="peminatan" role="tabpanel">
	              	peminatan
	              </div>
	              <div class="tab-pane" id="kelas" role="tabpanel">
	              	kelas
	              </div>
	            </div>
			</div>
		</div>		
</div>
@endsection
@push('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		// $('#tab_kurikulum').DataTable();
	});
</script>
@endpush