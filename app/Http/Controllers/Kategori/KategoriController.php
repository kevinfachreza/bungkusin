<?php

namespace App\Http\Controllers\Kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\MenuMakanan;
use App\MenuMakananKategori;

class KategoriController extends Controller
{
    public function index($id)
    {
    		$data['pkls'] = MenuMakanan::where('kategori',$id)->get();
    		$data['kategori'] = MenuMakananKategori::find($id);
    		return view('kategori.index',$data);
    }
}
