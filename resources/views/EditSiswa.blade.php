@extends('layouts.app2')
@section('content')
@include('layouts.sidebar')
<div class="main">
    @if(session('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Allert!</strong>{{session('status')}}
        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#profile" role="tab" aria-controls="home"><span><i class="fa fa-vcard"></i></span> Edit Profil</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-pane" id="profile" role="tabpanel">
                <form action="{{url('/edit/siswa/')}}/{{$siswa->id}}" class="form" method="post">
                    {{csrf_field()}}
                        <table class="table table-hover table-striped table-bordered">
                            <thead><th colspan="6" style="text-align:center;">Edit Data Siswa</th></thead>
                            <tbody>
                                <tr><th colspan="6">Data Pribadi</th></tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><input type="text" name="nama" class="form-control" value="{{$siswa->nama}}" required></td>
                                    <td>NIS</td>
                                    <td><input type="text" name="nis" class="form-control" value="{{$siswa->nis}}" readonly="true"></td>
                                    <td>NISN</td>
                                    <td><input type="text" name="nisn" class="form-control" value="{{$siswa->nisn}}" required></td>
                                </tr>
                                <tr>
                                    <td>No KK</td>
                                    <td><input type="text" name="no_kk" class="form-control"value="{{$siswa->no_kk}}" required></td>
                                    <td>NIK</td>
                                    <td colspan="3"><input type="text" name="nik" class="form-control"value="{{$siswa->nik}}" required></td>
                                    
                                </tr>
                                <tr>
                                    <td>TTL</td>
                                    <td>
                                        <input type="text" name="tmp_lahir" class="form-control" placeholder="Tempat Lahir"value="{{$siswa->tmp_lahir}}" required>
                                    </td>
                                    <td>Tanggal Lahir</td>
                                    <td><input type="text" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{$siswa->tgl_lahir}}" required></td>
                                    <td>Jenis Kelamin</td>
                                    <td>
                                        <select name="gender" class="form-control" required>
                                        <option value="{{$siswa->gender}}">{{$siswa->gender}} </option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumlah Saudara</td>
                                    <td><input type="text" name="jml_saudara" class="form-control" value="{{$siswa->jml_saudara}}" required></td>
                                    <td>Anak Ke</td>
                                    <td><input type="text" name="anak_ke" class="form-control" value="{{$siswa->anak_ke}}" required></td>
                                    <td>Agama</td>
                                    <td><select name="agama" class="form-control" required>
                                        <option value="{{$siswa->agama}}">{{$siswa->agama}} </option>
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
                                @if(count($alamat)>0)
                                @foreach($alamat as $alamat)
                                <tr>
                                    <td>Alamat</td>
                                    <td><input type="text" name="dusun_siswa" class="form-control" value="{{$alamat->dusun}}" required></td>
                                    <td>Desa</td>
                                    <td><input type="text" name="desa_siswa" class="form-control"value="{{$alamat->desa}}" required></td>
                                    <td>Kecamatan</td>
                                    <td><input type="text" name="kecamatan_siswa" class="form-control" value="{{$alamat->kecamatan}}" required></td>
                                </tr>
                                <tr>
                                    <td>Kabupaten</td>
                                    <td><input type="text" name="kabupaten_siswa" class="form-control" value="{{$alamat->kabupaten}}" required></td>
                                    <td>Provinsi</td>
                                    <td><input type="text" name="provinsi_siswa" class="form-control" value="{{$alamat->provinsi}}" required></td>
                                    <td>Kode Pos</td>
                                    <td><input type="text" name="kode_pos_siswa" class="form-control" value="{{$alamat->kode_pos}}" required></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td>Alamat</td>
                                    <td><input type="text" name="dusun_siswa" class="form-control" placeholder="jalan, RT/RW, Dusun" required></td>
                                    <td>Desa</td>
                                    <td><input type="text" name="desa_siswa" class="form-control" required></td>
                                    <td>Kecamatan</td>
                                    <td><input type="text" name="kecamatan_siswa" class="form-control" required ></td>
                                </tr>
                                <tr>
                                    <td>Kabupaten</td>
                                    <td><input type="text" name="kabupaten_siswa" class="form-control" required ></td>
                                    <td>Provinsi</td>
                                    <td><input type="text" name="provinsi_siswa" class="form-control" required ></td>
                                    <td>Kode Pos</td>
                                    <td><input type="text" name="kode_pos_siswa" class="form-control" required ></td>
                                </tr>
                                @endif
                                @if(count($ayah)>0)
                                @foreach($ayah as $ayah)
                                <tr><th colspan="6">Data Ayah</th></tr>
                                <tr>
                                    <td>Nama Ayah</td>
                                    <td><input type="text" name="nama_ayah" class="form-control" value="{{$ayah->nama}}" required></td>
                                    <td>Pekerjaan</td>
                                    <td><input type="text" name="pekerjaan_ayah" class="form-control" value="{{$ayah->pekerjaan}}" required></td>
                                    <td>Agama</td>
                                    <td><input type="text" name="agama_ayah" class="form-control" value="{{$ayah->agama}}" required></td>
                                </tr>
                                <tr>
                                    <td>No. Telp</td>
                                    <td><input type="text" name="telp_ayah" class="form-control" value="{{$ayah->tlp}}" required></td>
                                    <td>Email ayah</td>
                                    <td><input type="text" name="email_ayah" class="form-control" value="{{$ayah->email}}" required></td>
                                    <td>Penghasilan ayah</td>
                                    <td><input type="text" name="penghasilan_ayah" class="form-control" value="{{$ayah->penghasilan}}" required></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td colspan="5"><textarea name="alamat_ayah" class="form-control" required>{{$ayah->alamat}}</textarea></td>
                                </tr>
                                @endforeach
                                @else
                                <tr><th colspan="6">Data Ayah</th></tr>
                                <tr>
                                    <td>Nama Ayah</td>
                                    <td><input type="text" name="nama_ayah" class="form-control" required ></td>
                                    <td>Pekerjaan</td>
                                    <td><input type="text" name="pekerjaan_ayah" class="form-control" required ></td>
                                    <td>Agama</td>
                                    <td><input type="text" name="agama_ayah" class="form-control" required ></td>
                                </tr>
                                <tr>
                                    <td>No. Telp</td>
                                    <td><input type="text" name="telp_ayah" class="form-control" required ></td>
                                    <td>Email ayah</td>
                                    <td><input type="text" name="email_ayah" class="form-control" required ></td>
                                    <td>Penghasilan ayah</td>
                                    <td><input type="text" name="penghasilan_ayah" class="form-control" required ></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td colspan="5"><textarea name="alamat_ayah" class="form-control" required></textarea></td>
                                </tr>
                                @endif
                                @if(count($ibu)>0)
                                @foreach($ibu as $ibu)
                                <tr><th colspan="6">Data ibu</th></tr>
                                <tr>
                                    <td>Nama ibu</td>
                                    <td><input type="text" name="nama_ibu" class="form-control" value="{{$ibu->nama}}" required></td>
                                    <td>Pekerjaan</td>
                                    <td><input type="text" name="pekerjaan_ibu" class="form-control" value="{{$ibu->pekerjaan}}" required></td>
                                    <td>Agama</td>
                                    <td><input type="text" name="agama_ibu" class="form-control" value="{{$ibu->agama}}" required></td>
                                </tr>
                                <tr>
                                    <td>No. Telp</td>
                                    <td><input type="text" name="telp_ibu" class="form-control" value="{{$ibu->tlp}}" required></td>
                                    <td>Email ibu</td>
                                    <td><input type="text" name="email_ibu" class="form-control" value="{{$ibu->email}}" required></td>
                                    <td>Penghasilan ibu</td>
                                    <td><input type="text" name="penghasilan_ibu" class="form-control" value="{{$ibu->penghasilan}}" required></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td colspan="5"><textarea name="alamat_ibu" class="form-control" required>{{$ibu->alamat}} </textarea></td>
                                </tr>
                                @endforeach
                                @else
                                <tr><th colspan="6">Data ibu</th></tr>
                                <tr>
                                    <td>Nama ibu</td>
                                    <td><input type="text" name="nama_ibu" class="form-control" required ></td>
                                    <td>Pekerjaan</td>
                                    <td><input type="text" name="pekerjaan_ibu" class="form-control" required ></td>
                                    <td>Agama</td>
                                    <td><input type="text" name="agama_ibu" class="form-control" required ></td>
                                </tr>
                                <tr>
                                    <td>No. Telp</td>
                                    <td><input type="text" name="telp_ibu" class="form-control" required ></td>
                                    <td>Email ibu</td>
                                    <td><input type="text" name="email_ibu" class="form-control" required ></td>
                                    <td>Penghasilan ibu</td>
                                    <td><input type="text" name="penghasilan_ibu" class="form-control" required ></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td colspan="5"><textarea name="alamat_ibu" class="form-control" required></textarea></td>
                                </tr>
                                @endif
                                @if(count($wali)>0)
                                @foreach($wali as $wali)
                                <tr><th colspan="6">Data wali</th></tr>
                                <tr>
                                    <td>Nama wali</td>
                                    <td><input type="text" name="nama_wali" class="form-control" value="{{$wali->nama}}"></td>
                                    <td>Pekerjaan</td>
                                    <td><input type="text" name="pekerjaan_wali" class="form-control" value="{{$wali->pekerjaan}}"></td>
                                    <td>Agama</td>
                                    <td><input type="text" name="agama_wali" class="form-control" value="{{$wali->agama}}"></td>
                                </tr>
                                <tr>
                                    <td>No. Telp</td>
                                    <td><input type="text" name="telp_wali" class="form-control" value="{{$wali->tlp}}"></td>
                                    <td>Email wali</td>
                                    <td><input type="text" name="email_wali" class="form-control" value="{{$wali->email}}"></td>
                                    <td>Penghasilan wali</td>
                                    <td><input type="text" name="penghasilan_wali" class="form-control" value="{{$wali->penghasilan}}"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td colspan="5"><textarea name="alamat_wali" class="form-control">{{$wali->alamat}}</textarea></td>
                                </tr>
                                @endforeach
                                @else
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
                                @endif
                                <tr>
                                @if(count($asal_sekolah)>0)
                                @foreach($asal_sekolah as $asal_sekolah)
                                <th colspan="6">Asal Sekolah</th>
                                </tr>
                                <tr>
                                    <td colspan="2">Nama Sekolah</td>
                                    <td colspan="4"><input type="text" name="asal_sekolah" class="form-control" value="{{$asal_sekolah->asal_sekolah}}"required></td>
                                </tr>
                                <tr>
                                    <td colspan="6">Alamat Sekolah</td>
                                </tr>
                                <tr>
                                    <td>Dusun</td>
                                    <td><input type="text" name="dusun_sekolah" class="form-control" value="{{$asal_sekolah->dusun}}"required></td>
                                    <td>Desa</td>
                                    <td><input type="text" name="desa_sekolah" class="form-control" value="{{$asal_sekolah->desa}}"required></td>
                                    <td>Kecamatan</td>
                                    <td><input type="text" name="kecamatan_sekolah" class="form-control" value="{{$asal_sekolah->kecamatan}}"required></td>
                                </tr>
                                <tr>
                                    <td>Kabupaten</td>
                                    <td><input type="text" name="kabupaten_sekolah" class="form-control" value="{{$asal_sekolah->kabupaten}}"required></td>
                                    <td>Provinsi</td>
                                    <td><input type="text" name="provinsi_sekolah" class="form-control" value="{{$asal_sekolah->provinsi}}"required></td>
                                    <td>Kode Pos</td>
                                    <td><input type="text" name="kode_pos_sekolah" class="form-control" value="{{$asal_sekolah->kode_pos}}"required></td>
                                </tr>
                                @endforeach
                                @else
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
                                @endif
                                <tr>
                                    <td colspan="6">
                                         <button class="btn btn-primary pull-right" type="submit"><span><i class="fa fa-save"></i></span> | Simpan</button>                                
                                    </td>
                                </tr>
                            </tbody>
                            
                            
                        </table>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection