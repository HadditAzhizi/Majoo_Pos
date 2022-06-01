<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Mpembelian extends Model
{
    use HasFactory;

    public function get_data()
	{ 
		$data = DB::select("SELECT * FROM transaksi_beli inner join master_supplier on transaksi_beli.id_supplier=master_supplier.id"); 
		
		return $data;
	}
    public function laporan_pembelian_detail()
	{ 
		$data = DB::select("SELECT product.nama as product, transaksi_beli_detail.harga, transaksi_beli_detail.qty, transaksi_beli.no_pembelian, transaksi_beli.tgl_beli from transaksi_beli_detail inner join transaksi_beli on transaksi_beli_detail.id_pembelian=transaksi_beli.id inner join product on product.id=transaksi_beli_detail.product_id"); 
		
		return $data;
	}
}
