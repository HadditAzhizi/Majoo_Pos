<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use App\Models\Mproduct;
use App\Models\Mproduct_kateg;

class Product extends Controller
{ 
	public function index()
	{
		return view('dashboard/product');
	}
	public function product_tambah()
	{
  		$data['dt_kateg'] = Mproduct_kateg::get_data();
		return view('dashboard/product_form',$data);
	}
 
	public function tambah(Request $request)
	{ 
	   $messages = [
		    'file.required' => 'File Wajib Diisi!!!',
		    'nama.required' => 'Nama Wajib Diisi!!!',
		    'deskripsi.required' => 'Deskripsi Wajib Diisi!!!',
		    'harga.required' => 'Harga Wajib Diisi!!!',
		    'prod_kateg.required' => 'Kategori Product Wajib Diisi!!!'
		];

		$this->validate($request,[
			'file' =>'required',
		    'nama' => 'required|unique:product',
		    'deskripsi' => 'required',
		    'harga' => 'required',
		    'prod_kateg' => 'required'
		],$messages);

	   $name = time().'.'.request()->file->getClientOriginalExtension();
  
       $request->file->move(public_path('uploads'), $name);
  
		DB::table('product')->insert([
			'nama' => $request->nama,
			'gambar' => $name,
			'deskripsi' => $request->deskripsi,
			'harga' => $request->harga,
			'kateg_id' => $request->prod_kateg
		]);
  
        return json_encode($request);

	} 
	public function edit(Request $request)
	{ 
		$update = DB::table('product_kateg') ->where('id', $request->id)->update([
			'nama' => $request->nama
		]); 
		return True;
	}
	public function get_select(Request $request)
	{
		$data = DB::table('product_kateg')->where('id', $request->id)->get();
		return $data[0];
	}
	public function hapus(Request $request)
	{
		DB::table('product_kateg')->where('id', $request->id)->delete();
		return True;
	} 
}
