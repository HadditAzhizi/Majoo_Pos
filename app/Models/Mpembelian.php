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
}
