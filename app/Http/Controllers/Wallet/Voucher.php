<?php

namespace App\Http\Controllers\Wallet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VoucherModel;
use App\Wallet;
use App\WalletDetail;
use Auth;
use DB;
class Voucher extends Controller
{
	public function index()
	{
		return view('wallet.voucher');
	}
	public function submit(Request $request)
	{
		$voucher = $request->input('voucher');
		$checkVoucher = VoucherModel::where('kode',$voucher)->first();
		if(empty($checkVoucher))
		{
			return back()->with('status', 'Kode Voucher Tidak Ditemukan');
		}
		else
		{

			$check = $this->usedVoucher($voucher);
			if($check)
			{

				$wallet = Wallet::where('user_id',Auth::user()->id)->first();
				$wallet->saldo = $wallet->saldo + $checkVoucher->nominal;
				$wallet->save();

				$walletDetail = new WalletDetail;
				$walletDetail->wallet_id = $wallet->id;
				$walletDetail->nominal = $checkVoucher->nominal;
				$walletDetail->type = 1;
				$walletDetail->method = 1;
				$walletDetail->voucher_kode = $voucher;
				$walletDetail->status = 1;
				$walletDetail->save();
				return back()->with('status', 'Top Up Berhasil');
			}
			else
			{
				return back()->with('status', 'Voucher telah digunakan');
			}

		}
	}

	private function usedVoucher($voucher)
	{
		$walletDetail = DB::select("select 1 from wallet, wallet_detail where wallet_detail.voucher_kode = '".$voucher."' and wallet.user_id = ".Auth::user()->id." and wallet_detail.wallet_id = wallet.id" );

		if(!empty($walletDetail)) return 0;
		else return 1;
	}
}
