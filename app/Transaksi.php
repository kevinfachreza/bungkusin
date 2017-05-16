<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
	protected $table = 'transaksi';


	public function penjual_detail()
	{
		return $this->hasOne('App\User','id','penjual');
	}
	
	public function detail()
	{
		return $this->hasMany('App\TransaksiDetail');
	}

}
