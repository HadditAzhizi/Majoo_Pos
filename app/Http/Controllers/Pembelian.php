<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use App\Models\Mpembelian;
use App\Models\Msupplier;
use App\Models\Mproduct;

class Pembelian extends Controller
{ 
	public function index()
	{
  		$data['dt_pembelian'] = Mpembelian::get_data();
		return view('dashboard/pembelian', $data);
	} 
	public function pembelian_tambah()
	{
  		$data['dt_supplier'] = Msupplier::get_data();
  		$data['dt_product'] = Mproduct::get_data_product();
		return view('dashboard/pembelian_form',$data);
	} 
	public function tambah(Request $request)
	{ 
		DB::table('transaksi_beli')->insert([
			'no_pembelian' => $request->no_pembelian,
			'id_supplier' => $request->supplier,
			'tgl_beli' => $request->tgl_pembelian, 
			'total' => str_replace(',', '', $request->item_total)
		]);
		$id_pembelian =  DB::getPdo()->lastInsertId();
		$dt_product = $request->product;
		$qty =  explode(',', $request->qty_arr);
		$price =  explode(',', $request->harga_arr);

		$x=-1;
		foreach ($dt_product as $product)
		{
			$x++;
			DB::table('transaksi_beli_detail')->insert([
				'id_pembelian' => $id_pembelian,
				'product_id' => $product,
				'harga' => $price[$x], 
				'qty' => $qty[$x]
			]);

			$data = DB::select("UPDATE product_stock set stock = stock + '$qty[$x]' where product_id='$product'"); 

		}

		return True;

	} 
}
