@extends('layouts.app2')
@section('content')
@include('layouts.sidebar')
<div class="main">
    @if(session('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{session('status')}}</strong>
        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#profile" role="tab" aria-controls="home"><span><i class="fa fa-vcard"></i></span> Profil</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#akademik" role="tab" aria-controls="profile"><span><i class="fa fa-book"></i></span> Akademik</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kepesantrenan" role="tab" aria-controls="profile"><span><i class="fa fa-gears"></i></span> Kepesantrenan</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="profile" role="tabpanel">
                    <div class="row">
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <td colspan="2" style="text-align:center;">{{$siswa->nama}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                    @if($siswa->photo != null)
                                    <img src="{{asset('/img/profile')}}/{{$siswa->photo}}" alt="" style="">
                                    @else
                                    <img src="{{asset('/img/profile')}}/profile.jpg" style="height:200px; width:auto; display:block; margin-left:auto; margin-right:auto;">
                                    @endif
                                    </td>
                                </tr>
                                <tr>
                                <td>Edit Foto</td><td> <a href="" class="btn btn-sm btn-secondary pull-right"><span><i class="fa fa-camera"></i></span> Upload</a></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-9">
                            <table class="table table-striped">
                                <thead>
                                    <th colspan="3">Data Pribadi</th>
                                    <th><a href="{{url('edit/siswa')}}/{{$siswa->id}}" class="btn btn-sm btn-secondary pull-right"><span><i class="fa fa-edit"></i></span> Edit Profile</a></th>
                                </thead>
                                <tr>
                                    <td>Nama</td>
                                    <td colspan="3">{{$siswa->nama}}</td>
                                </tr>
                                <tr>
                                    <td>NIS</td>
                                    <td>{{$siswa->nis}}</td>
                                    <td>NISN</td>
                                    <td>{{$siswa->nisn}}</td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>{{$siswa->nik}}</td>
                                    <td>No. KK</td>
                                    <td>{{$siswa->no_kk}}</td>
                                </tr>
                                <tr>
                                    <td>Tempat</td>
                                    <td>{{$siswa->tmp_lahir}}</td>
                                    <td>Tanggal Lahir</td>
                                    <td>{{$siswa->tgl_lahir}}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>{{$siswa->gender}}</td>
                                    <td>Agama</td>
                                    <td>{{$siswa->agama}}</td>
                                </tr>
                                <tr>
                                    <td>Anak ke</td>
                                    <td>{{$siswa->anak_ke}}</td>
                                    <td>Jumlah saudara</td>
                                    <td>{{$siswa->jml_saudara}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td colspan="3">
                                    @foreach($alamat as $al)
                                    Dusun {{$al->dusun}} Kelurahan {{$al->desa}} Kecamatan {{$al->kecamatan}} Kabupaten {{$al->kabupaten}} 
                                    </br>Provinsi {{$al->provinsi}}
                                    </br>Kode Pos {{$al->kode_pos}}
                                    @endforeach
                                    </td>
                                </tr>
                                <th colspan="4">Data Orang Tua dan Sekolah Asal</th>
                            @if(count($keluarga)>0)
                                @foreach($keluarga as $kel)
                                <tr>
                                    <td colspan="4" style="text-align:center;"><b>Data {{$kel->status}} </b> <a href="{{url('delete/ortu')}}/{{$kel->id}}" class="btn btn-sm btn-secondary pull-right"><span><i class="fa fa-trash"></i></span> Hapus</a> </td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{$kel->nama}}</td>
                                    <td>Status</td>
                                    <td>{{$kel->status}}</td>
                                </tr>
                                <tr>
                                    <td>No Tlp</td>
                                    <td>{{$kel->tlp}}</td>
                                    <td>email</td>
                                    <td>{{$kel->email}}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>{{$kel->agama}}</td>
                                    <td>Penghasilan</td>
                                    <td>{{$kel->penghasilan}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td colspan="3">{{$kel->alamat}} </td>
                                </tr>
                                
                                @endforeach
                                @else
                                <tr>
                                <th colspan="4" style="text-align:center;" >Belum ada data Keluarga</br> <a href="{{url('/edit/siswa')}}/{{$siswa->id}}" class="btn btn-sm btn-secondary"><span><i class="fa fa-users"></i></span> Input Data</a> </th>
                                </tr>
                            @endif
                            @if(count($asal_sekolah)>0)
                            @foreach($asal_sekolah as $asal_sekolah)
                            <tr>
                            <th colspan="4" style="text-align:center;">Asal Sekolah
                            <a href="{{url('delete/sekolah')}}/{{$asal_sekolah->id}}" class="btn btn-sm btn-secondary pull-right"><span><i class="fa fa-trash"></i></span> Hapus</a>
                            </th>
                            </tr>
                            <tr>
                                <td>Nama Sekolah</td>
                                <td colspan="3">{{$asal_sekolah->asal_sekolah}}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td colspan="3">
                                {{$asal_sekolah->dusun}} {{$asal_sekolah->desa}} {{$asal_sekolah->kecamatan}} {{$asal_sekolah->kabupaten}}
                                </br> {{$asal_sekolah->provinsi}} Kode Pos: {{$asal_sekolah->kode_pos}}
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <th colspan="4" style="text-align:center;" >Belum ada data Sekolah </br> <a href="{{url('/edit/siswa')}}/{{$siswa->id}}" class="btn btn-sm btn-secondary"><span><i class="fa fa-bank"></i></span> Input Data</a> </th>
                            </tr>
                            @endif
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="akademik" role="tabpanel">
                    halaman akademik
                </div>
                <div class="tab-pane" id="kepesantrenan" role="tabpanel">
                    halaman kepesantrenan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection