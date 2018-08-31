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
    public function datasiswa(){
        $data=siswa::orderBy('status_id','asc')->get();
        // return $data[0]->status()->status;
        return Datatables::of($data)
            ->addColumn('option', function($data){
                return '<a href="#" class="btn btn-sm btn-info"><i class="fa fa-user"></i>Detail</a>';
            })->make(true);
    }
    public function index(){
    	return view('data_siswa');
    }
}
