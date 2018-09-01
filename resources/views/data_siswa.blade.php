@extends('layouts.app2')
@section('content')
@include('layouts.sidebar')

<div class="main">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home"><span><i class="fa fa-vcard"></i></span> Siswa</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"><span><i class="fa fa-edit"></i></span> Insert Data</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">
                    <table class="table table-bordered table-striped display" id="siswa" style="width:100%;">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th style="text-align:center;">TTL</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </thead>
                        <tbody>
                        <?php $x=1?>
                        @if(count($siswa)>0)
                        @foreach($siswa as $s)
                        <tr>
                            <td>{{$x++}}</td>
                            <td>{{$s->nama}}</td>
                            <td>{{$s->nis}}</td>
                            <td>{{$s->nisn}}</td>
                            <td>{{$s->tmp_lahir}}, {{$s->tgl_lahir}} </td>
                            <td>X IPA A</td>
                            <td>{{$s->status->status}}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary"><span><i class="fa fa-search"></i></span></a>
                                <a href="#" class="btn btn-sm btn-success"><span><i class="fa fa-pencil"></i></span></a>
                                <a href="#" class="btn btn-sm btn-danger"><span><i class="fa fa-trash"></i></span></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr><td>Data Tidak Ditemukan</td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="profile" role="tabpanel">
                    <form action="" class="form">
                        <table class="table table-hover table-striped table-bordered">
                            <thead><th colspan="6">Insert Data Siswa</th></thead>
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td><input type="text" name="nama" class="form-control"></td>
                                    <td>NIS</td>
                                    <td><input type="text" name="nis" class="form-control"></td>
                                    <td>NISN</td>
                                    <td><input type="text" name="nisn" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>No KK</td>
                                    <td><input type="text" name="no_kk" class="form-control"></td>
                                    <td>NIK</td>
                                    <td><input type="text" name="nik" class="form-control"></td>
                                    <td>TTL</td>
                                    <td>
                                        <div class="row auto">
                                            <input type="text" name="tmp_lahir" class="form-control col-6" placeholder="Tempat Lahir" style="margin-left:5%;">
                                            <input type="text" name="tgl_lahir" class="form-control col-5" placeholder="Tanggal Lahir">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumlah Saudara</td>
                                    <td><input type="text" name="jml_saudara" class="form-control"></td>
                                    <td>Anak Ke</td>
                                    <td><input type="text" name="anak_ke" class="form-control"></td>
                                    <td>Agama</td>
                                    <td><select name="agama" class="form-control">
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                        <option value="lain-lain">lain-lain</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr><th>Data Orang Tua</th></tr>
                                <tr>
                                    <td>Nama Ayah</td>
                                    <td><input type="text" name="no_kk" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th colspan="6">Asal Sekolah</th>
                                </tr>
                                <tr>
                                    <td>Nama Sekolah</td>
                                    <td><input type="text" name="nama_sekolah" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Dusun</td>
                                    <td><input type="text" name="dusun_sekolah" class="form-control"></td>
                                    <td>Desa</td>
                                    <td><input type="text" name="desa_sekolah" class="form-control"></td>
                                    <td>Kecamatan</td>
                                    <td><input type="text" name="kecamatan_sekolah" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Kabupaten</td>
                                    <td><input type="text" name="kabupaten_sekolah" class="form-control"></td>
                                    <td>Provinsi</td>
                                    <td><input type="text" name="provinsi_sekolah" class="form-control"></td>
                                    <td>Kode Pos</td>
                                    <td><input type="text" name="kode_pos_sekolah" class="form-control"></td>
                                </tr>
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready(function(){
    $('#siswa').DataTable();
});
</script>
@endpush