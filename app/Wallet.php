<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    	protected $table = 'wallet';

	public function detail()
	{
		return $this->hasMany('App\WalletDetail');
	}
}
