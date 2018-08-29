<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\staf;
use App\struktur;

class StafController extends Controller
{
    // struktur
    public function index()
    {
        // $data=staf::all();
        // return response()->json($data);
        return view('struktur');
    }
}
