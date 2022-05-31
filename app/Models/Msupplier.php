<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Msupplier extends Model
{
    use HasFactory;

    public function get_data()
	{ 
		$data = DB::select("SELECT * FROM master_supplier"); 
		
		return $data;
	}
}
