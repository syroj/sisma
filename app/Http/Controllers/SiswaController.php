<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
use App\sekolah;
use App\role;
use App\status;
use App\staf;

class SiswaController extends Controller
{
    public function datasiswa(){
    	return response()->json(siswa::all());
    }
    public function index(){

    	return view('siswa');
    }
}
