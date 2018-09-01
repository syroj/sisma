<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\siswa;
use App\sekolah;
use App\role;
use App\status;
use App\staf;
use App\asal_sekolah;
use App\alamat;

class SiswaController extends Controller
{
    public function index(){
        $nis=siswa::max('nis');
        $newNis=$nis+1;
        $data=siswa::orderBy('status_id','desc')->get();
    	return view('data_siswa')->with([
            'siswa'=>$data,
            'nis'=>$newNis
            ]);
    }
    public function SiswaBaru(Request $request){
        // $status=status::where('id','1')->get();
        $data_siswa=[
            'nama'=>$request->nama,
            'nis'=>$request->nis,
            'nisn'=>$request->nisn,
            'no_kk'=>$request->no_kk,
            'nik'=>$request->nik,
            'agama'=>$request->agama,
            'tmp_lahir'=>$request->tmp_lahir,
            'tgl_lahir'=>$request->tgl_lahir,
            'jml_saudara'=>$request->jml_saudara,
            'anak_ke'=>$request->anak_ke,
        ];
        siswa::insert($data_siswa);
        return redirect()->route('data_siswa');
        // dd($status);
        // dd($request->agama);
        // $alamat_siswa=[];
        // $data_ayah=[];
        // $data_ibu=[];
        // $data_wali=[];
        // $data_asalSekolah=[];

        dd($data_siswa);
    }
}
