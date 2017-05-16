<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
	protected $table = 'users_favorite';

	public function user()
	{
		return $this->hasOne('App\User','id','user_id');
	}

	public function restoran()
	{
		return $this->hasOne('App\User','id','menu_id');
	}
}
