<?php

namespace App\Http\Controllers\PKL;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaksi;
use Auth;

class PklAntrian extends Controller
{
    public function index($id,$transaksi)
    {
    		$antrian = Transaksi::where([
    			['status',1],
    			['penjual',$id],
    			['id','<=',$transaksi]
    			])
    		->get();

    		$data['antrian'] = count($antrian);
    		$data['transaksi'] = Transaksi::find($transaksi);
    		return view('pkl.antri',$data);
    }
}
