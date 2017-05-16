<?php

namespace App\Http\Controllers\PKL;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MenuMakanan;
use App\User;
use App\Wallet;
use App\walletDetail;
use Auth;
use App\Transaksi;
use App\TransaksiDetail;


class PklController extends Controller
{

    public function index($id)
    {
    		$data['pkl'] = User::find($id);
    		$data['menus'] = MenuMakanan::where('penjual',$id)->get();
    		return view('pkl.pkl',$data);
    }

    public function confirmation($id, Request $request)
    {
    		$data['pkl'] = User::find($id);
    		$data['menus'] = MenuMakanan::where('penjual',$id)->get();
    		$data['wallets'] = Wallet::where('user_id',Auth::user()->id)->orderBy('updated_at', 'desc')->get();

    		$menu = $request->input('menu');
    		$jumlah = $request->input('jumlah');

    		$i = 0;
    		$total = 0;
    		foreach($data['menus'] as $tmp)
    		{
    			if($tmp->id = $menu[$i])
    			{
    				$tmp->jumlah = $jumlah[$i];
    				$total += $tmp->jumlah * $tmp->harga;
    			}
    			$i++;
    		}
    		$data['total'] = $total;
    		$data['selected_menu'] = $menu;
    		$data['selected_jumlah'] = $jumlah;

    		return view('pkl.confirmation',$data);
    }


    public function submit($id, Request $request)
    {
    		$pkl = User::find($id);
    		$menus = MenuMakanan::where('penjual',$id)->get();

    		$selected_menus = $request->input('menu');
    		$jumlah = $request->input('jumlah');

    		$total = $this->getTotal($menus, $selected_menus,$jumlah);
    		$transaksi = $this->createTransaksi($id,$total);

    		$i = 0;
    		foreach($selected_menus as $selected_menu)
    		{
    			$transaksi_detail = $this->createTransaksiDetail($transaksi->id,$selected_menu,$jumlah[$i++]);
    		}

    		$wallet = $this->updateWallet($total);

    		#return view('pkl.confirmation',$data);
    }

    private function createTransaksi($id,$total)
    {
    		$transaksi = new Transaksi;
    		$transaksi->penjual = $id;
    		$transaksi->pembeli = Auth::user()->id;
    		$transaksi->total_harga = $total;
    		$transaksi->status = 0;
    		$transaksi->save();
    		return $transaksi;
    }

    private function createTransaksiDetail($id,$menu_id,$jumlah)
    {
    		$menu = MenuMakanan::find($menu_id);
    		$harga = $menu->harga;
    		$transaksi = new TransaksiDetail;
    		$transaksi->transaksi = $id;
    		$transaksi->menu = $menu_id;
    		$transaksi->jumlah = $jumlah;
    		$transaksi->sub_total = $harga*$jumlah;
    		$transaksi->save();
    		return $transaksi;
    }

    private function getTotal($menus,$selected_menu,$jumlah)
    {
    		$i = 0;
    		$total = 0;
    		foreach($menus as $tmp)
    		{
    			if($tmp->id = $selected_menu[$i])
    			{
    				$tmp->jumlah = $jumlah[$i];
    				$total += $tmp->jumlah * $tmp->harga;
    			}
    			$i++;
    		}

    		return $total;
    }

    private function updateWallet($total)
    {
    		$wallet = Wallet::where('user_id',Auth::user()->id)->first();
    		$wallet->saldo = $wallet->saldo - $total;
    		$wallet->save();

    		$walletDetail = new walletDetail;
    		$walletDetail->nominal = $total;
    		$walletDetail->type = -1;
    		$walletDetail->status = 1;
    		$walletDetail->save();

    }
}
