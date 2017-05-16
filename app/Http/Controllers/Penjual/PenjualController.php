<?php

namespace App\Http\Controllers\Penjual;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class PenjualController extends Controller
{
    public function index($id)
    {
			$data['nama'] = $this->getName($id); 
    		return view('penjual.lek-e',$data);
    }
	
	private function getName($id)
	{
		$nama = User::find($id);
    	return $nama;
	}
	

}
