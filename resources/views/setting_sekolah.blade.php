@extends('layouts.app2')
@section('content')
@include('layouts.sidebar')
<div class="main">
	<!-- <div class="container-fluid"> -->
		@if(session('status'))
	    <div class="alert alert-warning alert-dismissible fade show" role="alert">
	        <strong>{{session('status')}}</strong>
	        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">×</span>
	        </button>
	    </div>
	    @endif
		<div class="row">
			<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<ul class="nav nav-tabs" role="tablist">
                	<li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#messages3" role="tab" aria-controls="messages">
                      <i class="fa fa-bar-chart"></i> Profil Sekolah</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#status" role="tab" aria-controls="home">
                      <i class="fa fa-gears"></i> Status</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#role" role="tab" aria-controls="Role">
                      <i class="fa fa-user-secret"></i> Role</a>
                  </li>
                </ul>
				</div>
				<div class="card-body">
					<div class="tab-content">
		            <div class="tab-pane" id="status" role="tabpanel">
					<div class="row" style="margin-top: 15px;">
					<div class="col col-md-6">
						<table class="table table-bordered table-hover">
							<thead>
								<th>id</th>
								<th>Kode Status</th>
								<th>Status</th>
								<th>Action</th>
							</thead>
							<?php $i=1?>
							@if(count($status)>0)
								@foreach($status as $s)
							<tbody>
								<td>{{$i++}}</td>
								<td>{{$s->kode_status}} </td>
								<td>{{$s->status}} </td>
								<td>
									<div class="btn btn-group">
										<a class="btn btn-warning btn-sm" href="{{url('editstatus')}}/{{$s->id}}"><i class="fa fa-edit"></i></a>
										<a class="btn btn-danger btn-sm" href="{{url('d_status')}}/{{$s->id}}"><i class="fa fa-trash"></i></a>
									</div>
								</td>

							</tbody>
								@endforeach
							@else
							<tbody>
								<td colspan="4" style="text-align: center;">Belum ada Status</td>
							</tbody>
							@endif
						</table>
					</div>
					<div class="col-md-6">
						<form class="form" method="POST" action="{{url('addstatus')}}">
							{{csrf_field()}}
						<table class="table table-bordered">
							<tr>
								<th colspan="2" style="text-align: center;">Input Data Status</th>
							</tr>
							<tr>
								<td>Kode</td>
								<td><input type="text" name="kode_status" class="form-control" placeholder="Kode Status"></td>
							</tr>
							<tr>
								<td>Status</td>
								<td><input type="text" name="status" class="form-control" placeholder="Nama Status"></td>
							</tr>
								<td colspan="2">
									<button class="btn btn-primary pull-right" type="submit"><i class="fa fa-save"></i> Simpan</button>
								</td>
						</table>
						</form>
					</div>
					</div>              	
	               	</div>
                  <div class="tab-pane" id="role" role="tabpanel">
                  	<div class="row">
                  		<div class="col-md-6">
                  			<table class="table table-bordered">
                  				<thead>
                  					<th>no.</th>
                  					<th>Kode</th>
                  					<th>Role</th>
                  					<th>Action</th>
                  				</thead>
                  				<?php $x=1;?>
                  				@if (count($role)>0)
                  				@foreach($role as $r)
                  				<tbody>
                  					<td>{{$x++}}</td>
                  					<td>{{$r->kode_role}}</td>
                  					<td>{{$r->role}}</td>
                  					<td>
                  						<div class="btn btn-group">
                  							<a href="{{url('editrole')}}/{{$r->id}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> </a>
                  							<a href="{{url('deleterole')}}/{{$r->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a>
                  						</div>
                  					</td>
                  				</tbody>
                  				@endforeach
                  				@else
                  				<tbody>
                  					<td colspan="4" style="text-align: center;">Belum Ada Data</td>
                  				</tbody>
                  				@endif
                  			</table>
                  		</div>
                  		<div class="col-md-6">
                  			<form class="form" method="POST" action="{{url('addrole')}}">
                  				{{csrf_field()}}
                  			<table class="table table-hover table-bordered">
                  				<thead>
                  					<th colspan="2" style="text-align: center;">Input Data Role</th>
                  				</thead>
                  				<tbody>
                  					<tr>
	                  					<td>Kode</td>
	                  					<td><input type="text" name="kode_role" class="form-control" placeholder="Kode Role"></td>
                  					</tr>
                  					<tr>
                  						<td>Role</td>
                  						<td><input type="text" name="role" class="form-control" placeholder="Role"></td>
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
                  <div class="tab-pane active" id="messages3" role="tabpanel">	
                  	<table class="table table-bordered">
						@if (count($sekolah)==0)
						<td colspan="6" style="text-align: center;"><strong>Belum Ada Profil Sekolah</strong></td>
						<!-- form -->
						<tr>
							<td colspan="6">
								<div class="col-md-6 offset-3">
								<form class="form-horizontal" action="{{url('sekolah_add')}}" method="post">
									{{csrf_field()}}
				                      <div class="form-group row">
				                        <div class="col-md-12">
				                          <div class="input-group">
				                            <div class="input-group-prepend">
				                              <span class="input-group-text">
				                                <i class="fa fa-university"></i>
				                              </span>
				                            </div>
				                            <input class="form-control" id="input1-group1" type="text" name="nama" placeholder="Nama Sekolah">
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
				                            <input class="form-control" id="input1-group1" type="text" name="telp" placeholder="No Telp Sekolah">
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
				                            <input class="form-control" id="input1-group1" type="text" name="email" placeholder="Email">
				                          	</div>
				                      	</div>
				                      	<div class="col-md-6">
				                          <div class="input-group">
				                            <div class="input-group-prepend">
				                              <span class="input-group-text">
				                                <i class="fa fa-firefox"></i>
				                              </span>
				                            </div>
				                            <input class="form-control" id="input1-group1" type="text" name="website" placeholder="Website Sekolah">
				                          </div>
				                        </div>
				                      	</div>
				                      	<div class="form-group row">
				                      		<div class="col-md-12">
				                      			<textarea class="form-control" placeholder="Alamat" name="alamat"></textarea>
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
			                </td>
			                </tr>
						<!-- end form -->
						@else
						@foreach($sekolah as $d)
						<thead >
							<th colspan="3">Data Sekolah</th>
							<th>
								<div class="btn-group pull-right">
									<a href="{{url('editsekolah')}}/{{$d->id}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
									<a href="deletesekolah/{{$d->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
								</div>
							</th>
						</thead>
						<tbody>
							<tr>
								<td style="width: 150px;"><span><i class="fa fa-home"></i></span> Nama Sekolah</td>
								<td colspan="3">{{$d->nama}} </td>
							</tr>
							<tr>
								<td><span><i class="fa fa-bar-chart"></i></span> Jenjang</td>
								<td colspan="3">{{$d->level}} </td>
							</tr>
							<tr>
								<td> <span><i class="fa fa-phone"></i></span> No. Telp</td>
								<td>{{$d->telp}} </td>
								<td style="width: 150px;"><span><i class="fa fa-envelope"></i></span> Email </td>
								<td>{{$d->email}} </td>
							</tr>
							<tr>
								<td><span><i class="fa fa-firefox"></i></span> Website</td>
								<td colspan="3">{{$d->website}} </td>
							</tr>
							<tr>
								<td><span><i class="fa fa-map"></i></span> Alamat Sekolah</td>
								<td colspan="3">{{$d->alamat}} </td>
							</tr>
						</tbody>
						</tbody>
						@endforeach
						@endif
					</table>
                  </div>
                </div>
				</div>
			</div>
			</div>
		</div>
	<!-- </div>	 -->
</div>
@endsection