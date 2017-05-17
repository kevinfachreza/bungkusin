<?php

namespace App\Http\Controllers\Wallet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wallet;
use App\WalletDetail;
use Auth;
use DB;

class Transfer extends Controller
{
	public function index()
	{
		return view('wallet.transfer');
	}

	public function submit(Request $request)
	{
		$nominal = $request->input('nominal');
		$todayTransaction = WalletDetail::whereDate('created_at', '=', date('Y-m-d'))->where('method',2)->count();
 		$todayTransaction += 1;
 		$nominal += $todayTransaction;
 		
		$walletDetail = new WalletDetail;
		$walletDetail->wallet_id = Auth::user()->id;
		$walletDetail->nominal = $nominal;
		$walletDetail->type = 1;
		$walletDetail->method = 2;
		$walletDetail->status = 0;
		$walletDetail->save();

		$data['nominal'] = floor($nominal/1000);
		$data['nominal_id'] = str_pad($todayTransaction, 3, '0', STR_PAD_LEFT);

		return view('wallet.transferconfirmation',$data);
	}
}
