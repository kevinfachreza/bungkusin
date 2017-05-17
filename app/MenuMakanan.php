<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuMakanan extends Model
{
    protected $table = 'menu_makanan';

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'penjual');
    }
}
