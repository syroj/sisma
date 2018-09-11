<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\staf;
use App\User;
use App\siswa;

class StaffController extends Controller
{
    public function index(){
    	$guru=staff::all();
    	return view('data_guru')->with([
    		'guru'=>$guru,
    	]);

    }
}
