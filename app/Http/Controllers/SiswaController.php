<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use DataTables;
use App\siswa;
use App\sekolah;
use App\role;
use App\status;
use App\staf;
use App\asal_sekolah;
use App\alamat;
use App\keluarga;

class SiswaController extends Controller
{
    public function index(){
        $nis=siswa::max('nis');
        $newNis=$nis+1;
        $data=siswa::orderby('status_id','asc')->paginate(10);
    	return view('data_siswa')->with([
            'siswa'=>$data,
            'nis'=>$newNis
            ]);
    }
    public function search(Request $request){
        $key=$request->search;
        if ($key==null) {
            return redirect()->route('data_siswa')->with(['status'=>'Input Pencarian tidak boleh kosong']);
        }
        $nis=siswa::max('nis');
        $newNis=$nis+1;
        $siswa=siswa::where('nama','like','%'.$key.'%')->orwhere('nis','like','%'.$key.'%')->paginate(10);
        // dd($siswa);
        $siswa->appends($request->only('search'));
        return view('data_siswa',compact('siswa',$siswa, 'nis',$newNis));
    }
    public function bystatus($key){
        $nis=siswa::max('nis');
        $newNis=$nis+1;
        $siswa=siswa::where('status_id',$key)->paginate(10);
        return view('data_siswa',compact('siswa',$siswa, 'nis',$newNis));
    }
    public function SiswaBaru(Request $request){
        $status=status::findOrFail(1);
        $data_siswa=[
            'nama'=>$request->nama,
            'nis'=>$request->nis,
            'nisn'=>$request->nisn,
            'no_kk'=>$request->no_kk,
            'nik'=>$request->nik,
            'agama'=>$request->agama,
            'gender'=>$request->gender,
            'tmp_lahir'=>$request->tmp_lahir,
            'tgl_lahir'=>$request->tgl_lahir,
            'jml_saudara'=>$request->jml_saudara,
            'anak_ke'=>$request->anak_ke,
            'status_id'=>$status->id
        ];
        $siswa=siswa::create($data_siswa);
        $alamat_siswa=[
            'dusun' =>$request->dusun_siswa,
            'desa' =>$request->desa_siswa,
            'kecamatan' =>$request->kecamatan_siswa,
            'kabupaten' =>$request->kabupaten_siswa,
            'provinsi' =>$request->provinsi_siswa,
            'kode_pos'=>$request->kode_pos_siswa,
        ];
        $alamat=$siswa->alamat()->create($alamat_siswa);
        $data_ayah=[
            'nama'=>$request->nama_ayah,
            'pekerjaan'=>$request->pekerjaan_ayah,
            'agama'=>$request->agama_ayah,
            'tlp'=>$request->telp_ayah,
            'email'=>$request->email_ayah,
            'penghasilan'=>$request->penghasilan_ayah,
            'alamat'=>$request->alamat_ayah,
            'status'=>'Ayah'
        ];
        $data_ibu=[
            'nama'=>$request->nama_ibu,
            'pekerjaan'=>$request->pekerjaan_ibu,
            'agama'=>$request->agama_ibu,
            'tlp'=>$request->telp_ibu,
            'email'=>$request->email_ibu,
            'penghasilan'=>$request->penghasilan_ibu,
            'alamat'=>$request->alamat_ibu,
            'status'=>'Ibu'
        ];
        if ($request->nama_wali && $request->pekerjaan_wali && $request->agama_wali && $request->telp_wali && $request->email_wali && $request->penghasilan_wali && $request->alamat_wali != null) {
            $data_wali=[
                'nama'=>$request->nama_wali,
                'pekerjaan'=>$request->pekerjaan_wali,
                'agama'=>$request->agama_wali,
                'tlp'=>$request->telp_wali,
                'email'=>$request->email_wali,
                'penghasilan'=>$request->penghasilan_wali,
                'alamat'=>$request->alamat_wali,
                'status'=>'Wali'
            ];   
        $wali=$siswa->keluarga()->create($data_wali);
        } else {
            
        }
        $data_asalSekolah=[
            'asal_sekolah'=>$request->asal_sekolah,
            'dusun'=>$request->dusun_sekolah,
            'desa'=>$request->desa_sekolah,
            'kecamatan'=>$request->kecamatan_sekolah,
            'kabupaten'=>$request->kabupaten_sekolah,
            'provinsi'=>$request->provinsi_sekolah,
            'kode_pos'=>$request->kode_pos_sekolah,
        ];
        $ayah=$siswa->keluarga()->create($data_ayah);
        $ibu=$siswa->keluarga()->create($data_ibu);
        $asal=$siswa->asal_sekolah()->create($data_asalSekolah);
        return redirect()->route('data_siswa')->with(['status'=>'Data Berhasil Disimpan']);
    }
    public function ProfilSiswa($id){
        $siswa=siswa::findOrFail($id);
        $alamat=alamat::where('siswa_id',$id)->get();
        $keluarga=keluarga::where('siswa_id',$id)->get();
        $asal_sekolah=asal_sekolah::where('siswa_id',$id)->get();
        return view('ProfilSiswa')->with([
            'siswa'=>$siswa,
            'alamat'=>$alamat,
            'keluarga'=>$keluarga,
            'asal_sekolah'=>$asal_sekolah
        ]);
        // dd($asal_sekolah);
    }
    public function EditSiswa($id){
        $siswa=siswa::findorfail($id);
        $alamat=alamat::where('siswa_id',$id)->get();
        $asal_sekolah=asal_sekolah::where('siswa_id',$id)->get();
        $ayah=keluarga::where('siswa_id',$id)->where('status','like','Ayah')->get();
        $ibu=keluarga::where('siswa_id',$id)->where('status','like','Ibu')->get();
        $wali=keluarga::where('siswa_id',$id)->where('status','like','Wali')->get();
        return view('EditSiswa')->with([
            'siswa'=>$siswa,
            'ayah'=>$ayah,
            'ibu'=>$ibu,
            'wali'=>$wali,
            'alamat'=>$alamat,
            'asal_sekolah'=>$asal_sekolah
        ]);
    }
    public function SaveEditSiswa(Request $request,$id){

        $count_ayah=keluarga::where('siswa_id',$id)->where('status','like','ayah')->count();
        $count_ibu=keluarga::where('siswa_id',$id)->where('status','like','ibu')->count();
        $count_wali=keluarga::where('siswa_id',$id)->where('status','like','wali')->count();
        $count_alamat=alamat::where('siswa_id',$id)->count();
        $count_asal_sekolah=asal_sekolah::where('siswa_id',$id)->count();
        
            $data_siswa=[
                'nama'=>$request->nama,
                'nis'=>$request->nis,
                'nisn'=>$request->nisn,
                'no_kk'=>$request->no_kk,
                'nik'=>$request->nik,
                'agama'=>$request->agama,
                'gender'=>$request->gender,
                'tmp_lahir'=>$request->tmp_lahir,
                'tgl_lahir'=>$request->tgl_lahir,
                'jml_saudara'=>$request->jml_saudara,
                'anak_ke'=>$request->anak_ke
            ];
            $data_ayah=[
                'nama'=>$request->nama_ayah,
                'pekerjaan'=>$request->pekerjaan_ayah,
                'agama'=>$request->agama_ayah,
                'tlp'=>$request->telp_ayah,
                'email'=>$request->email_ayah,
                'penghasilan'=>$request->penghasilan_ayah,
                'alamat'=>$request->alamat_ayah,
                'status'=>'Ayah'
            ];
            $data_ibu=[
                'nama'=>$request->nama_ibu,
                'pekerjaan'=>$request->pekerjaan_ibu,
                'agama'=>$request->agama_ibu,
                'tlp'=>$request->telp_ibu,
                'email'=>$request->email_ibu,
                'penghasilan'=>$request->penghasilan_ibu,
                'alamat'=>$request->alamat_ibu,
                'status'=>'Ibu'
            ];
            $data_asalSekolah=[
                'asal_sekolah'=>$request->asal_sekolah,
                'dusun'=>$request->dusun_sekolah,
                'desa'=>$request->desa_sekolah,
                'kecamatan'=>$request->kecamatan_sekolah,
                'kabupaten'=>$request->kabupaten_sekolah,
                'provinsi'=>$request->provinsi_sekolah,
                'kode_pos'=>$request->kode_pos_sekolah,
            ];
            $alamat_siswa=[
                'dusun' =>$request->dusun_siswa,
                'desa' =>$request->desa_siswa,
                'kecamatan' =>$request->kecamatan_siswa,
                'kabupaten' =>$request->kabupaten_siswa,
                'provinsi' =>$request->provinsi_siswa,
                'kode_pos'=>$request->kode_pos_siswa,
            ];
            // update data siswa
            $siswa=siswa::where('id',$id)->update($data_siswa);                     
            // update data ayah
            if ($count_ayah == 0) {
                $siswa=siswa::findorfail($id);
                $ayah=$siswa->keluarga()->create($data_ayah); 
            } else {
               $ayah=keluarga::where('siswa_id',$id)->where('status','like','Ayah')->update($data_ayah);
            }
            // update data ibu
            if ($count_ibu == 0) {
                $siswa=siswa::findorfail($id);
                $ibu=$siswa->keluarga()->create($data_ibu); 
            } else {
               $ibu=keluarga::where('siswa_id',$id)->where('status','like','ibu')->update($data_ibu);
            }

            // update data wali
        if ($request->nama_wali && $request->pekerjaan_wali && $request->agama_wali && $request->telp_wali && $request->email_wali && $request->penghasilan_wali && $request->alamat_wali != null) {
            $data_wali=[
                'nama'=>$request->nama_wali,
                'pekerjaan'=>$request->pekerjaan_wali,
                'agama'=>$request->agama_wali,
                'tlp'=>$request->telp_wali,
                'email'=>$request->email_wali,
                'penghasilan'=>$request->penghasilan_wali,
                'alamat'=>$request->alamat_wali,
                'status'=>'Wali'
            ];
            if ($count_wali == 0) {
                $siswa=siswa::findorfail($id);
                $wali=$siswa->keluarga()->create($data_wali); 
            } else {
               $wali=keluarga::where('siswa_id',$id)->where('status','like','wali')->update($data_wali);
            }
        } 
        //  update data sekolah asal
            if ($count_asal_sekolah == 0) {
                $siswa=siswa::findorfail($id);
                $asal_sekolah=$siswa->asal_sekolah()->create($data_asalSekolah); 
            } else {
               $asal_sekolah=asal_sekolah::where('siswa_id',$id)->update($data_asalSekolah);
            }
        // update alamat siswa
        if ($count_alamat == 0) {
            $siswa=siswa::findorfail($id);
            $alamat=$siswa->alamat()->create($alamat_siswa); 
        } else {
           $alamat=alamat::where('siswa_id',$id)->update($alamat_siswa);
        }
     
        return redirect('detail/siswa/'.$id)->with(['status'=>'Data Berhasil diperbaharui']);     
    }
    public function deleteOrtu($id){
        $ortu=keluarga::findorfail($id);
        if ($ortu!=null) {
            keluarga::where('id',$id)->delete($ortu);
            return back()->with('status','Data berhasil dihapus');
        } else {
            return back()->with('status','Data Tidak Ditemukan, Gagal Menghapus data');
        }
    }
    public function deleteSekolah($id){
        $sekolah=asal_sekolah::findorfail($id);
        if ($sekolah !=null) {
            asal_sekolah::where('id',$id)->delete($sekolah);
            return back()->with('status','Data berhasil dihapus');           
        } else {
            return back()->with('status','Data Tidak Ditemukan, Gagal Menghapus data');            
        }
    }
}
