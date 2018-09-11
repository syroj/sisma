<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\staf;
use App\User;
use App\siswa;
use App\role;

class GuruController extends Controller
{
    
    public function index(){
    	$guru=staf::paginate(15);
    	return view('data_guru',compact('guru',$guru));
    }
    public function cariguru(Request $request){
    	$key=$request->search;
    	if ($key==null) {
            return back()->with(['status'=>'Input Pencarian tidak boleh kosong']);
        }
        $guru=staf::where('nama','like','%'.$key.'%')->orwhere('nip','like','%'.$key.'%')->paginate(10);
        $guru->appends($request->only('search'));
        return view('data_guru',compact('guru',$guru));
    }
}
