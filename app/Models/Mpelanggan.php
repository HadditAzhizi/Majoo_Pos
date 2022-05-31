<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Mpelanggan extends Model
{
    use HasFactory;

    public function get_data()
	{ 
		$data = DB::select("SELECT * FROM master_pelanggan"); 
		
		return $data;
	}
}
