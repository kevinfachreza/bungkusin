<?php

namespace App\Http\Controllers\Penjual;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Search extends Controller
{
    public function index(Request $request)
    {
    		$keyword = $request->get('keyword');
    		$pkl = DB::select("Select * from users where name LIKE '%".$keyword."%' and penjual = 1");
    		if(empty($pkl))
    		{
    			$status = 0;
    		}
    		else
    		{
    			$status = 1;
    		}

    		return array([
			'status' => $status,
			'pkl' => $pkl
			]);


    }
}
