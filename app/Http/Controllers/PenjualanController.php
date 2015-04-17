<?php namespace App\Http\Controllers;
use App\Http\Requests\Request;
use App\User;
use App\Product;
use App\Cart;
use App\Pesanan;
use App\Penjualan;
use DB;
use Auth;
class PenjualanController extends Controller {


	public function showListPenjualan()
	{
		if(\Session::has('id')){
			$arrayPenjualan = Penjualan::all();	
			return view('listpenjualan',compact('arrayPenjualan'));
		}else{
			$str = "Anda harus login sebagai administrator.";
			return view('status.loginrequired',compact('str'));
		}
	}

}
