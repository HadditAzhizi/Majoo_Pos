<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use App\Models\Mpelanggan;

class Pelanggan extends Controller
{ 
	public function index()
	{
  		$data['dt_pelanggan'] = Mpelanggan::get_data();
		return view('dashboard/pelanggan', $data);
	}
 
	public function tambah(Request $request)
	{ 
		DB::table('master_pelanggan')->insert([
			'nama' => $request->nama,
			'alamat' => $request->alamat,
			'no_telp' => $request->no_telp,
			'email' => $request->email
		]);

		return True;

	} 
	public function edit(Request $request)
	{ 
		$update = DB::table('master_pelanggan') ->where('id', $request->id)->update([
			'nama' => $request->nama,
			'alamat' => $request->alamat,
			'no_telp' => $request->no_telp,
			'email' => $request->email
		]); 
		return True;
	}
	public function get_select(Request $request)
	{
		$data = DB::table('master_pelanggan')->where('id', $request->id)->get();
		return $data[0];
	}
	public function hapus(Request $request)
	{
		DB::table('master_pelanggan')->where('id', $request->id)->delete();
		return True;
	} 
}
