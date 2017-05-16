<?php

namespace App\Http\Controllers\Penjual;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Transaksi;
use App\TransaksiDetail;


class PenjualController extends Controller
{
    public function index($id)
    {
			$transaksi = DB::table('transaksi')->where('penjual', $id)->get();
			//foreach ($transaksi as $tmp)
			//{
				//echo ($tmp->id);
			//}
		
			$data['nama'] = $this->getName($id); 
			
    		return view('penjual.lek-e',$data);
    }
	
	private function getName($id)
	{
		$nama = User::find($id);
    	return $nama;
	}
	private function getOrderan()
	{
		$antrian = Transaksi::where([
    			['status',0],
    			['accepted_at','<>',NULL],
    			['penjual',$id],
    			['id','<',$transaksi]
    			])
    		->get();
	}

}
