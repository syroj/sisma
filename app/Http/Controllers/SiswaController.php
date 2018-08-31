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
        $data=siswa::orderBy('status_id','desc')->get();
    	return view('data_siswa')->with(['siswa'=>$data]);
    }
}
