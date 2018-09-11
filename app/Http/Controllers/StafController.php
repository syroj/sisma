<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\staf;
use App\struktur;

class StafController extends Controller
{
    // struktur
    public function index(Request $request)
    {
        $stafs=staf::paginate(10);
        $stafs->appends($request->only('search'));
        return view('staf',compact('stafs',$stafs));
    }
    public function cari(Request $request)
    {
    	$key=$request->search;
    	$stafs=staf::where('nama','like','%'.$key.'%')->orwhere('nip','like','%'.$key.'%')->paginate(5);
    	// dd($hasil);
        $stafs->appends($request->only('search'));
        return view('staf',compact('stafs',$stafs));
    }
    public function create(Request $request)
    {
    	// $data=$request->all();
    	$nama=$request->nama .', '. $request->gelar;
    	$status_id=1;
    	$data=[
    		'nama'=>$nama,
    		'nip'=>$request->nip,
    		'gender'=>$request->gender,
    		'tmp_lahir'=>$request->tmp_lahir,
    		'tgl_lahir'=>$request->tgl_lahir,
    		'alamat'=>$request->alamat,
    		'pendidikan'=>$request->pendidikan,
    		'almamater'=>$request->almamater,
    		'photo'=>'no photo',
    		'status_id'=>$status_id,
    	];
    	$data_user=[
    		'name'=>$nama,
    		'email'=>$request->email,
    		'status_id'=>$status_id,
    		'password'=>bcrypt('rahasia')
    	];
    	$user=user::create($data_user);
    	$user->staf()->create($data);
    	return redirect('staf')->with('status','Data Berhasil Dimasukkan');
    }
    public function detail($id)
    {
    	$find=staf::findorfail($id);
    	return view('profil_staf',compact('find',$find));
    }
    public function editstaf($id)
    {
    	$staf=staf::findorfail($id);
    	return view('edit_staf',compact('staf',$staf));
    }
}
