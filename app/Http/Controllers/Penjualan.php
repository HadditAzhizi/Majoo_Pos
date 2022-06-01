<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use App\Models\Mpenjualan;
use App\Models\Mpelanggan;
use App\Models\Mproduct;

class Penjualan extends Controller
{ 
	public function index()
	{
  		$data['dt_penjualan'] = Mpenjualan::get_data();
		return view('dashboard/penjualan', $data);
	} 
	public function penjualan_tambah()
	{
  		$data['dt_pelanggan'] = Mpelanggan::get_data();
  		$data['dt_product'] = Mproduct::get_data_product();
		return view('dashboard/penjualan_form',$data);
	} 
	public function tambah(Request $request)
	{ 
		DB::table('transaksi_jual')->insert([
			'no_penjualan' => $request->no_penjualan,
			'id_pelanggan' => $request->pelanggan,
			'tgl_jual' => $request->tgl_penjualan, 
			'total' => str_replace(',', '', $request->item_total)
		]);
		$id_penjualan =  DB::getPdo()->lastInsertId();
		$dt_product = $request->product;
		$qty =  explode(',', $request->qty_arr);
		$price =  explode(',', $request->harga_arr);

		$x=-1;
		foreach ($dt_product as $product)
		{
			$x++;
			DB::table('transaksi_jual_detail')->insert([
				'id_penjualan' => $id_penjualan,
				'product_id' => $product,
				'harga' => $price[$x], 
				'qty' => $qty[$x]
			]);

			$data = DB::select("UPDATE product_stock set stock = stock - '$qty[$x]' where product_id='$product'"); 

		}

		return True;

	} 
}
