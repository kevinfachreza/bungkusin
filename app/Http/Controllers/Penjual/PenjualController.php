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
			$query = "SELECT * from transaksi_detail trd, menu_makanan m where trd.transaksi =".$item->id." and m.id = trd.menu";
			$item->pesan1 =  DB::select($query);
			array_push($antri, $item);
		}
		

		$query3 = "SELECT tr.id, u.name,  tr.id, tr.total_harga  from transaksi tr, users u where tr.pembeli = u.id and tr.status = 2 and tr.penjual = ".$id."";
		$query3 = DB::select($query3);
		foreach ($query3 as $item2) {
			$query = "SELECT * from transaksi_detail trd, menu_makanan m where trd.transaksi =".$item2->id." and m.id = trd.menu";
			$item2->pesan2 =  DB::select($query);
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
		//echo $id;
		$data['isi'] = DB::table('wallet')->where('user_id',$id)->first();
		$data['isi']->saldo = $this->buatrp($data['isi']->saldo);
		$data['log'] = DB::table('log_mutasi')->where('id_penjual',$id)->orderBy('Tanggal', 'desc')->orderBy('Waktu','desc')->get();
		$data['id']= $id;
		foreach ($data['log'] as $tmp)
		{
			$tmp->Nilai = $this->buatrp($tmp->Nilai);
			$tmp->Tanggal = $this->buattgl($tmp->Tanggal);
		//	print_r ($tmp->Nilai);
			
		}
		//print_r ($data['isi']->saldo);
		return view('penjual.temp',$data);
		
	}
	public function abis($id)
	{
		$query = DB::table('wallet')->where('user_id', $id)->first();
		$isi = $query->saldo;
		
		DB::table('wallet')
            ->where('user_id', $id)
            ->update(['saldo' => 0]);
		DB::table('log_mutasi')->insert(
				[
					'Tipe' => 'Dana Cair',
					'Nilai' => $isi,
					'Tanggal' => date("Y-m-d"),
					'Waktu' => date("h:i:s"),
					'id_penjual' => $id
				]
		);
		
		return redirect('penjual/wallet/'.$id.'');
	}
	
	function buattgl($tanggal)
	{
		$hari = array ( 1 =>    'Senin',
					'Selasa',
					'Rabu',
					'Kamis',
					'Jumat',
					'Sabtu',
					'Minggu'
				);
				
		$bulan = array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		$split 	  = explode('-', $tanggal);
		$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	
	}
	
	
	
	public function buatrp($angka)
	{
		$jadi = "Rp " . number_format($angka,2,',','.');
		return $jadi;
		
	}
	public function ordersiap($id)
	{
		
		//echo $id;
		DB::table('transaksi')
            ->where('id', $id)
            ->update(['status' => 1]);
		$lupa = DB::table('transaksi')->where('id',$id)->first();
		
		//return $this->index($lupa->penjual);
		
		return redirect('penjual/'.$lupa->penjual.'');
	}
	public function selesai($id)
	{
		
		//echo $id;
		DB::table('transaksi')
            ->where('id', $id)
            ->update(['status' => 2]);
		$lupa = DB::table('transaksi')->where('id',$id)->first();

		return redirect('penjual/'.$lupa->penjual.'');
	}
	public function ambil($id)
	{
		$query = DB::table('transaksi')->where('id',$id)->first();
		$totalharga = $query->total_harga;
		$lupa = DB::table('transaksi')->where('id',$id)->first();
		//echo $totalharga;
		DB::table('log_mutasi')->insert(
				[
					'Tipe' => 'Penjualan',
					'Nilai' => $totalharga,
					'Tanggal' => date("Y-m-d"),
					'Waktu' => date("h:i:s"),
					'id_penjual' => $lupa->penjual
				]
		);
		$tmp = DB::table('wallet')->where('user_id',$lupa->penjual)->first();
		$walletnow = $tmp->saldo + $totalharga;
		echo $walletnow;
		DB::table('wallet')
            ->where('user_id', $lupa->penjual)
            ->update(['saldo' => $walletnow]);
		DB::table('transaksi')->where('id', $id)->delete();
		return redirect('penjual/'.$lupa->penjual.'');
	}
}
