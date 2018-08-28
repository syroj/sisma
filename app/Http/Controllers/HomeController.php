<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sekolah;
use App\siswa;
use App\role;
use App\status;
use App\staf;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa_aktif=siswa::where('status_id',1)->count();
        $staf_aktif=staf::where('status_id',1)->count();
        return view('home2')->with([
            'siswa'=>$siswa_aktif,
            'staf'=>$staf_aktif
        ]);
    }
    public function bendahara(){
        return view('bendahara');
    }
    public function guru(){
        return view('guru');
    }
    public function tu(){
        return view('tu');
    }
    public function staf(){
        return view('staf');
    }
}
