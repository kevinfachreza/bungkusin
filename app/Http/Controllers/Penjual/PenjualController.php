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
    	$orderan = array();
		$antri = array();
		$siap = array();
		
		$query = "SELECT tr.id, u.name,  tr.id, tr.total_harga from transaksi tr, users u where tr.pembeli = u.id and tr.status = 0 and tr.penjual = ".$id."";
		$query = DB::select($query);
		foreach ($query as $order) {
			$query = "SELECT * from transaksi_detail trd, menu_makanan m where trd.transaksi =".$order->id." and m.id = trd.menu";
			$order->pesan =  DB::select($query);
			array_push($orderan, $order);
			
		}

		$query2 = "SELECT tr.id, u.name,  tr.id, tr.total_harga  from transaksi tr, users u where tr.pembeli = u.id and tr.status = 1 and tr.penjual = ".$id."";
		$query2 = DB::select($query2);
		foreach ($query2 as $item) {
			$query = "SELECT * from transaksi_detail trd, menu_makanan m where trd.transaksi =".$order->id." and m.id = trd.menu";
			$order->pesan =  DB::select($query);
			array_push($antri, $item);
		}
		print_r($antri);

		$query3 = "SELECT tr.id, u.name,  tr.id, tr.total_harga  from transaksi tr, users u where tr.pembeli = u.id and tr.status = 2 and tr.penjual = ".$id."";
		$query3 = DB::select($query3);
		foreach ($query3 as $item2) {
			$query = "SELECT * from transaksi_detail trd, menu_makanan m where trd.transaksi =".$order->id." and m.id = trd.menu";
			$order->pesan =  DB::select($query);
			array_push($siap, $item2);
		}
		//foreach ($transaksi as $tmp)
		//{
			//echo ($tmp->id);
		//}
		$data['nama'] = $this->getName($id); 
		$data['orderan'] = $orderan;
		$data['antri'] = $antri;
		$data['siap'] = $siap;
		
		return view('penjual.lek-e',$data);
    }
	
	public function getName($id)
	{
		$nama = User::find($id);
    	return $nama;
	}
	public function getOrderan()
	{
		$antrian = Transaksi::where([
    			['status',0],
    			['accepted_at','<>',NULL],
    			['penjual',$id],
    			['id','<',$transaksi]
    			])
    		->get();
	}
	public function wallet($id)
	{
		echo $id;
		return view('penjual.temp');
		
	}
	public function ordersiap($id)
	{
		
		echo $id;
		DB::table('transaksi')
            ->where('id', $id)
            ->update(['status' => 1]);
		
	}
	
}
