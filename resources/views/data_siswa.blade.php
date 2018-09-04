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
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#setting" role="tab" aria-controls="profile"><span><i class="fa fa-gears"></i></span> Setting</a>
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
                            <td>
                            @if(($s->status_id!=null))
                            {{$s->status->status}}
                            @else
                            Undefined status
                            @endif
                            </td>
                            <td>
                                <a href="{{url('detail/siswa')}}/{{$s->id}}" class="btn btn-sm btn-primary"><span><i class="fa fa-search"></i></span></a>
                                <a href="{{url('edit/siswa')}}/{{$s->id}}" class="btn btn-sm btn-success"><span><i class="fa fa-pencil"></i></span></a>
                                <a href="{{url('setting/siswa')}}/{{$s->id}}" class="btn btn-sm btn-danger"><span><i class="fa fa-gears"></i></span></a>
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
                    <form action="{{url('/create_siswa')}}" class="form" method="post">
                    {{csrf_field()}}
                        <table class="table table-hover table-striped table-bordered">
                            <thead><th colspan="6" style="text-align:center;">Insert Data Siswa</th></thead>
                            <tbody>
                                <tr><th colspan="6">Data Pribadi</th></tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><input type="text" name="nama" class="form-control" required></td>
                                    <td>NIS</td>
                                    <td><input type="text" name="nis" class="form-control" required value="{{$nis}}" readonly="true"></td>
                                    <td>NISN</td>
                                    <td><input type="text" name="nisn" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td>No KK</td>
                                    <td><input type="text" name="no_kk" class="form-control" required></td>
                                    <td>NIK</td>
                                    <td colspan="3"><input type="text" name="nik" class="form-control" required></td>
                                    
                                </tr>
                                <tr>
                                    <td>TTL</td>
                                    <td>
                                        <input type="text" name="tmp_lahir" class="form-control" required placeholder="Tempat Lahir">
                                    </td>
                                    <td>Tanggal Lahir</td>
                                    <td><input type="text" name="tgl_lahir" class="form-control" required placeholder="Tanggal Lahir"></td>
                                    <td>Jenis Kelamin</td>
                                    <td>
                                        <select name="gender" class="form-control" required>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumlah Saudara</td>
                                    <td><input type="text" name="jml_saudara" class="form-control" required></td>
                                    <td>Anak Ke</td>
                                    <td><input type="text" name="anak_ke" class="form-control" required></td>
                                    <td>Agama</td>
                                    <td><select name="agama" class="form-control" required>
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
                                
                                <tr>
                                    <td colspan="6">Alamat siswa</td>
                                </tr>
                                <tr>
                                    <td>Dusun</td>
                                    <td><input type="text" name="dusun_siswa" class="form-control" required></td>
                                    <td>Desa</td>
                                    <td><input type="text" name="desa_siswa" class="form-control" required></td>
                                    <td>Kecamatan</td>
                                    <td><input type="text" name="kecamatan_siswa" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td>Kabupaten</td>
                                    <td><input type="text" name="kabupaten_siswa" class="form-control" required></td>
                                    <td>Provinsi</td>
                                    <td><input type="text" name="provinsi_siswa" class="form-control" required></td>
                                    <td>Kode Pos</td>
                                    <td><input type="text" name="kode_pos_siswa" class="form-control" required></td>
                                </tr>


                                <tr><th colspan="6">Data Ayah</th></tr>
                                <tr>
                                    <td>Nama Ayah</td>
                                    <td><input type="text" name="nama_ayah" class="form-control" required></td>
                                    <td>Pekerjaan</td>
                                    <td><input type="text" name="pekerjaan_ayah" class="form-control" required></td>
                                    <td>Agama</td>
                                    <td><input type="text" name="agama_ayah" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td>No. Telp</td>
                                    <td><input type="text" name="telp_ayah" class="form-control" required></td>
                                    <td>Email ayah</td>
                                    <td><input type="text" name="email_ayah" class="form-control" required></td>
                                    <td>Penghasilan ayah</td>
                                    <td><input type="text" name="penghasilan_ayah" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td colspan="5"><textarea name="alamat_ayah" class="form-control" required></textarea></td>
                                </tr>
                                
                                <tr><th colspan="6">Data ibu</th></tr>
                                <tr>
                                    <td>Nama ibu</td>
                                    <td><input type="text" name="nama_ibu" class="form-control" required></td>
                                    <td>Pekerjaan</td>
                                    <td><input type="text" name="pekerjaan_ibu" class="form-control" required></td>
                                    <td>Agama</td>
                                    <td><input type="text" name="agama_ibu" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td>No. Telp</td>
                                    <td><input type="text" name="telp_ibu" class="form-control" required></td>
                                    <td>Email ibu</td>
                                    <td><input type="text" name="email_ibu" class="form-control" required></td>
                                    <td>Penghasilan ibu</td>
                                    <td><input type="text" name="penghasilan_ibu" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td colspan="5"><textarea name="alamat_ibu" class="form-control" required></textarea></td>
                                </tr>

                                <tr><th colspan="6">Data wali</th></tr>
                                <tr>
                                    <td>Nama wali</td>
                                    <td><input type="text" name="nama_wali" class="form-control"></td>
                                    <td>Pekerjaan</td>
                                    <td><input type="text" name="pekerjaan_wali" class="form-control"></td>
                                    <td>Agama</td>
                                    <td><input type="text" name="agama_wali" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>No. Telp</td>
                                    <td><input type="text" name="telp_wali" class="form-control"></td>
                                    <td>Email wali</td>
                                    <td><input type="text" name="email_wali" class="form-control"></td>
                                    <td>Penghasilan wali</td>
                                    <td><input type="text" name="penghasilan_wali" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td colspan="5"><textarea name="alamat_wali" class="form-control"></textarea></td>
                                </tr>

                                <tr>
                                    <th colspan="6">Asal Sekolah</th>
                                </tr>
                                <tr>
                                    <td colspan="2">Nama Sekolah</td>
                                    <td colspan="4"><input type="text" name="asal_sekolah" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td colspan="6">Alamat Sekolah</td>
                                </tr>
                                <tr>
                                    <td>Dusun</td>
                                    <td><input type="text" name="dusun_sekolah" class="form-control" required></td>
                                    <td>Desa</td>
                                    <td><input type="text" name="desa_sekolah" class="form-control" required></td>
                                    <td>Kecamatan</td>
                                    <td><input type="text" name="kecamatan_sekolah" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td>Kabupaten</td>
                                    <td><input type="text" name="kabupaten_sekolah" class="form-control" required></td>
                                    <td>Provinsi</td>
                                    <td><input type="text" name="provinsi_sekolah" class="form-control" required></td>
                                    <td>Kode Pos</td>
                                    <td><input type="text" name="kode_pos_sekolah" class="form-control" required></td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                         <button class="btn btn-primary pull-right" type="submit">Submit</button>                                
                                    </td>
                                </tr>
                            </tbody>
                            
                            
                        </table>
                    </form>
                </div>
                <div class="tab-pane" id="setting" role="tabpanel">
                    fitur seting siswa
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