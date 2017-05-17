<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use App\UserFavorite;
use App\MenuMakananKategori;
use App\Transaksi;
use App\Wallet;
use Auth;

class HomeController extends Controller
{
    public function index()
    {       
        if (Auth::user()->penjual == 1) {
                return redirect('/penjual/'.Auth::user()->id);
            }
         
    		$data['slides'] = $this->getSlides();
    		$data['favorites'] = $this->getFavorites();
    		$data['categories'] = $this->getKategori();
    		$data['transactions'] = $this->getTransactions();
    		$data['wallets'] = $this->getWallet();
			
    		$money = $data['wallets'][0]->saldo;
    		$data['money'] = number_format($money,0);
			
    		return view('home.home',$data);
    }

    private function getSlides()
    {
    		$slides = Slider::where('active',1)->get();
    		return $slides;
    }

    private function getFavorites()
    {
    		$food = UserFavorite::where('user_id',Auth::user()->id)->take(3)->get();
    		return $food;
    }

    private function getKategori()
    {
    		$food = MenuMakananKategori::take(9)->get();
    		return $food;
    }

    private function getTransactions()
    {
    		$transaksi = Transaksi::where('pembeli',Auth::user()->id)->orderBy('updated_at', 'desc')->get();
    		return $transaksi;
    }

    private function getWallet()
    {
    		$transaksi = Wallet::where('user_id',Auth::user()->id)->orderBy('updated_at', 'desc')->get();
    		return $transaksi;
    }
}
