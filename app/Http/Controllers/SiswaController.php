<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
use App\sekolah;
use App\role;
use App\status;
use App\staf;
use App\asal_sekolah;
use App\alamat;

class SiswaController extends Controller
{
    public function datasiswa(){
        $data=siswa::all();
    	return response()->json($data);
    }
    public function index(){
    	return view('data_siswa');
    }
}
