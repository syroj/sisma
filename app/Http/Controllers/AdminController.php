<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\status;
use App\role;


class AdminController extends Controller
{
    // Status
	public function AddStatus(Request $request){
		$data=$request->all();
		status::create($data);
		return redirect('/setting');
	}
	public function editstatus($id){
		$data=status::find($id);
		// dd($data);
		return view('editstatus')->with('data',$data);
	}
	public function saveeditstatus(Request $request, $id){
		$data=$request->except('_token');
		$save=status::where('id',$id)->update($data);
		return redirect('/setting');
	}
	public function deletestatus($id){
		$delete=status::where('id',$id)->delete();
		return redirect('/setting');
	}

	// Role
	public function AddRole(Request $request){
		$data=$request->all();
		role::create($data);
		return redirect('/setting');
	}
	public function editrole($id){
		$data=role::find($id);
		return view('editrole')->with('data',$data);
	}
	public function saveeditrole(Request $request,$id){
		$data=$request->except('_token');
		$save=role::where('id',$id)->update($data);
		return redirect('/setting');
	}
	public function deleterole($id){
		$delete=role::where('id',$id)->delete();
		return redirect('/setting');
	}
	// struktur
	public function struktur(){
		
	}
}
