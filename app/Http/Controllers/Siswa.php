<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

class Siswa extends Controller
{ 
	public function tambah(Request $request)
	{ 
		DB::table('siswa')->insert([
			'nis' => $request->nis, 
			'nama' => $request->nama, 
			'tgl_lahir' => $request->tgl_lahir, 
			'jenis_kelamin' => $request->jenis_kel, 
			'alamat' => $request->alamat
		]);

		return True;

	}  
	public function edit(Request $request)
	{ 
		$update = DB::table('siswa') ->where('id', $request->id)->update([
			'nis' => $request->nis, 
			'nama' => $request->nama, 
			'tgl_lahir' => $request->tgl_lahir, 
			'jenis_kelamin' => $request->jenis_kel, 
			'alamat' => $request->alamat
		]); 
		return True;
	}
	public function get_select(Request $request)
	{
		$data = DB::table('siswa')->where('id', $request->id)->get();
		return $data[0];
	}
	public function hapus(Request $request)
	{
		DB::table('siswa')->where('id', $request->id)->delete();
		return True;
	}
}
