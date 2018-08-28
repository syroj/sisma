@extends('layouts.app2')
@section('content')
<div class="main">
<div class="col-md-6 offset-3" style="margin-top: 15px;">
	<div class="card">
		<div class="card-header">
			<strong>Edit Sekolah</strong>
		</div>
		<div class="card-body">
			<form class="form-horizontal" action="{{url('savesekolah')}}/{{$data->id}}" method="POST">
				{{csrf_field()}}
			      <div class="form-group row">
			        <div class="col-md-12">
			          <div class="input-group">
			            <div class="input-group-prepend">
			              <span class="input-group-text">
			                <i class="fa fa-university"></i>
			              </span>
			            </div>
			            <input class="form-control" id="input1-group1" type="text" name="nama" placeholder="Nama Sekolah" value="{{$data->nama}}">
			          </div>
			        </div>
			      </div>
			      <div class="form-group row">
			      	<div class="col-md-6">
			          <div class="input-group">
			            <div class="input-group-prepend">
			              <span class="input-group-text">
			                <i class="fa fa-phone"></i>
			              </span>
			            </div>
			            <input class="form-control" id="input1-group1" type="text" name="telp" placeholder="No Telp Sekolah" value="{{$data->telp}}">
			          </div>
			        </div>
			         <div class="col-md-6">
			      		<select class="form-control" name="level">
			          	<option>Pilih Tingkat sekolah</option>
			          	<option value="SD/Sederajat">SD/Sederajat</option>
			          	<option value="SMP/Sederajat">SMP/Sederajat</option>
			          	<option value="SMA/Sederajat">SMA/Sederajat</option>
			          	</select>	
			      	</div>
			        
			      </div>
			      <div class="form-group row">
			      	
			      	<div class="col-md-6">
			      		<div class="input-group">
			            <div class="input-group-prepend">
			              <span class="input-group-text">
			                <i class="fa fa-envelope"></i>
			              </span>
			            </div>
			            <input class="form-control" id="input1-group1" type="text" name="email" placeholder="Email" value="{{$data->email}}">
			          	</div>
			      	</div>
			      	<div class="col-md-6">
			          <div class="input-group">
			            <div class="input-group-prepend">
			              <span class="input-group-text">
			                <i class="fa fa-firefox"></i>
			              </span>
			            </div>
			            <input class="form-control" id="input1-group1" type="text" name="website" placeholder="Website Sekolah" value="{{$data->website}}">
			          </div>
			        </div>
			      	</div>
			      	<div class="form-group row">
			      		<div class="col-md-12">
			      			<textarea class="form-control" placeholder="Alamat" name="alamat">{{$data->alamat}}</textarea>
			      		</div>
			      	</div>
			      	<div class="form-group row">
			      		<div class="col col-md-2 offset-9">
			      			<button class="btn btn-md btn-primary"><i class="fa fa-save"></i> Simpan</button>
			      		</div>
			      	</div>
			      </div>
			</form>
		</div>
	</div>
</div>
</div>
@endsection