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
        <div class="box" style="margin-top: -1em;">
            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home"><span><i class="fa fa-user-circle"></i></span> Guru</a>
                        </li>
                        <li class="">
                        <a class="nav-link" data-toggle="tab" href="#InsertGuru" role="tab" aria-controls="profile"><span><i class="fa fa-edit"></i></span> Tambah Guru</a>
                        </li>
                        <li class="">
                        <a class="nav-link" data-toggle="tab" href="#setting" role="tab" aria-controls="profile"><span><i class="fa fa-wrench"></i></span> Setting</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
            		<div class="tab-pane active" id="home" role="tabpanel">
                        <div class="row">
                            <div class="col-md-4 pull-right" style="padding-bottom: 1em;">
                                    <form action="{{url('cariguru')}}" method="get" class="form">
                                        <div class="input-group">
                                            <input type="text" name="search" class="form-control" placeholder="Cari Nama atau NIP">
                                            <span class="input-group-btn">
                                                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                                </button>
                                                <a href="{{url('/home')}}" id="search-btn" class="btn btn-default btn-flat"><i class="fa fa-home"></i>
                                                </a>
                                                <a href="{{url('/data_guru')}}" id="search-btn" class="btn btn-default btn-flat"><i class="fa fa-arrow-left"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </form>    
                            </div>
                        </div>
            				<table class="table table-bordered" id="TabelGuru" style="margin-right: auto;margin-left: auto;">
            					<thead>
            						<th>No.</th>
            						<th>Nama</th>
                                    <th>NIP</th>
            						<th>Email</th>
            						<th>Status</th>
            						<th>Rules</th>
                                    <th>Mapel</th>
            						<th style="width: 150px;">Opsi</th>
            					</thead>
            					<tbody>
            						@if(count($guru)>0)
            						<?php $g=1;?>
            						@foreach($guru as $gr)
            						<tr>
            							<td>{{$g++}}</td>
            							<td>{{$gr->nama}}</td>
                                        <td>{{$gr->nip}}</td>
            							<td>{{$gr->user->email}}</td>
            							<td>{{$gr->status->status}}</td>
            							<td>Guru</td>
                                        <td>Biologi</td>
            							<td>
        									<a href="{{url('detail/staf')}}/{{$gr->id}}" class="btn btn-sm btn-default"><span><i class="fa fa-search"></i></span></a>
        									<a href="{{url('edit/guru')}}/{{$gr->id}}" class="btn btn-sm btn-default"><span><i class="fa fa-edit"></i></span></a>
        									<a href="{{url('setting/guru')}}/{{$gr->id}}" class="btn btn-sm btn-default"><span><i class="fa fa-wrench"></i></span></a>
            							</td>
            						</tr>
            						@endforeach
            						@else
            						@endif
            					</tbody>
                            </table>
                            <div class="pagination pagination-sm pull-right" style="margin-top: -2em;">
                                    {{$guru->links()}}
                            </div>
            		</div>
            		<div class="tab-pane" id="InsertGuru" role="tabpanel">Halaman Insert Guru</div>
            		<div class="tab-pane" id="setting" role="tabpanel">Halaman Setting Guru</div>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection