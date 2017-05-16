<?php

namespace App\Http\Controllers\PKL;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PklController extends Controller
{
		public function index()
		{
			return view('penjual.lek-e');
		}
}
