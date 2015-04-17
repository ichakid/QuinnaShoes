<?php namespace App\Http\Controllers;
use App\Http\Requests\Request;
use App\User;
use App\Product;
use App\Cart;
use App\Pesanan;
use App\Penjualan;
use DB;
use Auth;
use App\DetailPemesanan;
class PesananController extends Controller {

	public function showListPesanan()
	{	
		if(\Session::has('id')){
			if(\Session::get('peran')==1){
				$arrayPesanan = DB::table('pesanan')
		                    ->whereNotIn('status', array("Selesai"))->get();

		   		 $str = "List Order";
		    }else{
		    	$arrayPesanan = DB::table('pesanan')
							->whereNotIn('deleted', array("true"))
							->where('tipe', array("cart"))
							->where('id_user',\Session::get('id'))
							->get();

		    	$str = "List Cart Order";
		    }
			return view ("listpesanan",compact('arrayPesanan'),compact('str'));
		}else{
			$str = "Anda harus login untuk memesan.";
			return view('status.loginrequired',compact('str'));
		}
	}
	public function showListOrderByDesign()
	{	
		if(\Session::has('id')){
			if(\Session::get('peran')==1){
				return "salah di pesanan Controller";
		    }else{
		    	$arrayPesanan = DB::table('pesanan')
							->whereNotIn('deleted', array("true"))
							->where('tipe', array("pesanan"))
							->where('id_user',\Session::get('id'))
							->get();
		    }
		    $str = "List Order by Design";
			return view ("listpesanan",compact('arrayPesanan'),compact('str'));
		}else{
			$str = "Anda harus login untuk memesan.";
			return view('status.loginrequired',compact('str'));
		}
	}
	public function orderByDesign(){
		if(\Session::has('id')){
			if((\Session::get('peran'))==2){
				$str = "empty.jpg";
				return view('orderbydesign',compact('str'));
			 }else{
				$str = "Anda tidak bisa menggunakan akun ini untuk memesan.";
				return view('status.loginrequired',compact('str'));
		    }
		}else{
			$str = "Anda harus login untuk memesan sepatu";
			return view('status.loginrequired',compact('str'));
		}
	}

	public function upload() {
		$nama_gambar = (\Request::file("image")->getClientOriginalName());
		$mime_type = (\Request::file("image")->getClientMimeType());
		$ekstensi = (\Request::file("image")->guessClientExtension());
		$path = (\Request::file("image")->getRealPath());
		//dd($path);
		\Session::put('uploaded', "true");
		\Request::file('image')->move(__DIR__.'/../'.'/../'.'/../'.'public/images/pesanan',\Request::file('image')->getClientOriginalName());
		//dd(\Request::all());

		$str = $nama_gambar;
		return view("orderbydesign",compact('str'));
	}

	public function checkPesanan()
	{
		$pesanan = new Pesanan;
		$pesanan->id_user = (\Session::get('id'));
		$pesanan->nama_gambar = (\Request::get('nama_gambar'));
		$pesanan->deadline = (\Request::get('deadline'));
		$pesanan->deskripsi_pemesanan = (\Request::get('deskripsi_pemesanan'));
		$pesanan->alamat = (\Request::get('alamat'));
		$pesanan->jenis_pembayaran = (\Request::get('pembayaran'));
		$pesanan->jumlah = (\Request::get('jumlah'));
		$pesanan->deskripsi_ukuran =(\Request::get('deskripsi_ukuran'));
		$pesanan->no_telepon = (\Request::get('no_telepon'));
		$pesanan->save();
    	 $str = "Berhasil Mengirimkan Pesanan";
    	return view("status.success",compact("str"));
	}


	public function acceptPesanan($id)
	{
    	 DB::table('pesanan')
            ->where('id', $id)
            ->update(array('status' =>'Diterima'));

		return redirect('listpesanan');
	}
	
	public function finishPesanan($id)
	{
		\Session::put('id_pesanan_finish', $id);
		return redirect ('finish');
	}
	
	
	public function finish()
	{
		return view ('finishconfirmed');
	}

	public function finishConfirmed()
	{
		try{
			$pesanan = Pesanan::find(\Session::get('id_pesanan_finish'));
			$penjualan = new Penjualan;
			$penjualan->id_user = $pesanan->id_user;
			$penjualan->id_pesanan = (\Session::get('id_pesanan_finish'));
			$penjualan->total_bayar = (\Request::get('total_bayar'));
			$penjualan->save();
			DB::table('pesanan')
		            ->where('id', (\Session::get('id_pesanan_finish')))
		            ->update(array('status' =>'Selesai'));
        	 $str = "Berhasil Mengkonfirmasi Penjualan";
        	return view("status.success",compact("str"));
        } catch (\Exception $e) {
        	dd($e);
        	$str = "Gagal Mengkonfirmasi Penjualan";
        	return view("status.failed",compact("str"));
		}
	}
	public function deletePesanan($id)
	{
		if(\Session::get('peran')==1){
	    	$Delete = DB::table('pesanan')
	                ->where('id', $id)
	                ->first();
			$pesananDelete = Pesanan::find($Delete->id);
			$pesananDelete->delete();
		}else{
			$pesanan = Pesanan::find($id);
			if($pesanan->status == "Selesai"){
		    	 DB::table('pesanan')
		            ->where('id', $id)
		            ->update(array('deleted' =>'true'));
		    }else{
		    	 DB::table('pesanan')
		            ->where('id', $id)
		            ->update(array('deleted' =>'true', 'status' => 'Dibatalkan'));
		    }
		}
		return redirect('listpesanan');
	}
	
	public function detailCart($id)
	{
		\Session::put('id_pesanan_cart', $id);
		return redirect('detailcartredirect');
	}
	

	public function detailPesanan($id)
	{
		\Session::put('id_pesanan', $id);
		return redirect('detailpesananredirect');
	}

	public function detailPesananRedirect()
	{
		$pesanan = Pesanan::find(\Session::get('id_pesanan'));
	
		return view('detailpesanan',compact('pesanan'));
	}

	public function detailCartRedirect()
	{
		$pesanan = Pesanan::find(\Session::get('id_pesanan_cart'));
		return view('listcart',compact('pesanan'));
	}

	public function detailPemesananRedirect($id)
	{
		\Session::put('id_detail_pemesanan',$id);
		return redirect('detailpemesanan');
	}

	public function detailPemesanan($id)
	{
		\Session::put('id_detail_pemesanan',$id);
		return redirect('detailpemesanan');
	}

	public function detailPemesananCartRedirect()
	{
		
		$detailPemesanan = DetailPemesanan::find( \Session::get('id_detail_pemesanan'));
		//return $detailPemesanan;
		return view('detailpemesanancart',compact('detailPemesanan'));
	}

}
