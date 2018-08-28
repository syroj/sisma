<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sekolah;
use App\siswa;
use App\role;
use App\status;
use App\tahun_ajaran;
use App\kurikulum;
use App\jurusan;
use App\smester;
class SekolahController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}
	public function setting(){
    	$sekolah=sekolah::get();
    	$role=role::get();
    	$status=status::get();
		return view('setting_sekolah')->with([
			'sekolah'	=>$sekolah,
			'role'		=>$role,
			'status'	=>$status
		]);
	}
	// KBM
	public function kbm(){
		$kurikulum=kurikulum::all();
		$jurusan=jurusan::all();
		$datas=tahun_ajaran::all();
		$smester=smester::all();
		// return $datas;
		return view('kbm')->with([
			'ta'=>$datas,
			'kurikulum'=>$kurikulum,
			'jurusan'=>$jurusan,
			'sm'=>$smester
		]);
	}
	// kurikulum
	public function addkurikulum(Request $request){
		$data=[
			'nama'=>$request->nama,
			'deskripsi'=>$request->deskripsi,
			'status_id'=>1
		];
		// return $data;
		$save=kurikulum::insert($data);
		return redirect('/kbm');
	}
	public function show_kurikulum($id){
		$data=kurikulum::find($id);
		// return $data;
		return view('editkurikulum')->with(['data'=>$data]);
	}
	public function savekurikulum(Request $request, $id){
		if ($request->nama && $request->deskripsi !=null) {
			$data=$request->except('_token');
			kurikulum::where('id',$id)->update($data);
			return redirect('/kbm');
		}else{
			return redirect('/kbm');
		}
	}
	public function deletekurikulum($id){
		$delete=kurikulum::where('id',$id)->delete();
		return redirect('/kbm');
	}
	public function add_ta(Request $request){
		$data=[
			'nama'=>$request->nama,
			'tgl_mulai'=>$request->tgl_mulai,
			'tgl_selesai'=>$request->tgl_selesai,
			'kurikulum_id'=>$request->kurikulum_id,
			'status_id'=>1
		];
		// dd($data);
		tahun_ajaran::insert($data);
		return redirect('/kbm');
	}

	// sekolah
	public function AddSekolah(Request $request){
		$data=$request->except('_token');
		sekolah::insert($data);
		return redirect('/setting');
		dd($data);
	}
	public function editsekolah($id){
		$data=sekolah::find($id);
		// dd($data);
		return view('editsekolah')->with('data',$data);
	}
	public function savesekolah(Request $request,$id){
		$data=$request->except('_token');
		$save=sekolah::where('id',$id)->update($data);
		return redirect('/setting');
	}
	public function deletesekolah($id){
		$delete=sekolah::where('id',$id)->delete();
		return redirect('/setting');
	}
	
}
