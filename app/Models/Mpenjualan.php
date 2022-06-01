<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Mpenjualan extends Model
{
    use HasFactory;

    public function get_data()
	{ 
		$data = DB::select("SELECT * FROM transaksi_jual inner join master_pelanggan on transaksi_beli.id_pelanggan=master_pelanggan.id"); 
		
		return $data;
	}
}
