@extends('layouts.app1')
@section('content')
@include('layouts.sidebar1')
<div class="content-wrapper">
    <div class="content">
        <div class="box" style="margin-top: -1em;">
            <div class="box-header">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active">
                        <a data-toggle="tab" href="#struktur" role="tab" aria-controls="profile"><span><i class="fa fa-sitemap"></i></span> Struktur</a>
                        </li>
                        <li>
                        <a data-toggle="tab" href="#add_struktur" role="tab" aria-controls="profile"><span><i class="fa fa-pencil"></i></span> Tambah Struktur</a>
                        </li>
                        <li>
                        <a data-toggle="tab" href="#jobdesc" role="tab" aria-controls="messages"><span><i class="fa fa-list"></i></span> Deskripsi</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="struktur" role="tabpanel">
                        ini halaman Struktur
                    </div>
                    <div class="tab-pane" id="add_struktur" role="tabpanel">
                        <div class="row">
                            <div class="col-md-7">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>No.</th>
                                        <th>Jabatan</th>
                                        <th>Deskripsi</th>
                                        <th>Opsi</th>
                                    </thead>
                                    <tbody id="struktur"></tbody>
                                </table>
                            </div>
                            <div class="col-md-5">
                                <form method="POST" action="{{url('tambah_struktur')}}">
                                    {{csrf_field()}}
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Jabatan</td>
                                            <td><input type="text" name="posisi" class="form-control" placeholder="Jabatan" required></td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi Singkat</td>
                                            <td><input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Singkat"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><button class="btn btn-sm btn-default pull-right" type="submit"><span><i class="fa fa-pencil"></i></span> Tambah Jabatan</button></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="jobdesc" role="tabpanel">
                        halaman job description
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection