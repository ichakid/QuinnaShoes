<?php namespace App\Http\Controllers;
use App\Http\Requests\Request;
use App\User;
use App\Product;
use App\Pesanan;
use App\Cart;
use DB;
use Auth;
use App\DetailPemesanan;

class CartController extends Controller {

	public function showCart()
	{
		if(\Session::has('id')){
				$isiCart = DB::table('cart')
		                    ->where('id_user', (\Session::get('id')))
		                    ->where('status', 'unremove')
		                    ->get();		   
			return view('cart',compact('isiCart'));
		}else{
			$str = "Anda harus login untuk menggunakan cart.";
			return view('status.loginrequired',compact('str'));
		}
	}

	public function confirmedCheckout()
	{
		DB::table('detail_pemesanan')
							->whereNotIn('id', array(\Session::get('id_data_saved')))->delete();
		
		$pesanan = new Pesanan;
		$pesanan->id_user = (\Session::get('id'));
		$pesanan->nama_gambar = "cart.png";
		$pesanan->deadline = "-";
		$pesanan->deskripsi_pemesanan = "Ada ".\Request::get('jumlah_item')." jenis sepatu";
		$pesanan->alamat = "-";
		$pesanan->jenis_pembayaran = "-";
		$pesanan->jumlah = (\Request::get('total_jumlah'));
		$pesanan->deskripsi_ukuran ='-';
		$pesanan->no_telepon ="-";
		$pesanan->tipe = "cart";
		$pesanan->total_bayar = (\Request::get('total_bayar'));
		$pesanan->id_detail_pemesanan = \Session::get('id_data_saved');
		$pesanan->save();

		$isiCart = DB::table('cart')
		                    ->where('id_user', (\Session::get('id')))
		                    ->where('status', 'unremove')
		                    ->update(array('id_pesanan' => $pesanan->id,'status' => 'remove'));
    	 $str = "Berhasil Mengirimkan Pesanan";
    	return view("status.success",compact("str"));
	}


	public function checkout()
	{
		if(\Session::has('id')){

			\Session::put('id_data_saved', 0);
			$isiCart = DB::table('cart')
		                    ->where('id_user', (\Session::get('id')))
		                    ->where('status', 'unremove')
		                    ->get();	
	        if($isiCart == null){
	        	$str = "Tidak bisa melakukan checkout. Cart Anda masih kosong!";
        		return view("status.failed",compact("str"));
	        }else{	   
				return view('checkout',compact('isiCart'));
			}
		}else{
			$str = "Anda harus login untuk menggunakan cart.";
			return view('status.loginrequired',compact('str'));
		}
		
	}

	public function checkoutData()
	{
		$data = new DetailPemesanan;
		$data->id_user = (\Session::get('id'));
		$data->nama_pemesan =  (\Request::get('nama_pemesan'));
		$data->telepon_pemesan =  (\Request::get('telepon_pemesan'));
		$data->email_pemesan =  (\Request::get('email_pemesan'));
		$data->alamat1_pemesan =  (\Request::get('alamat1_pemesan'));
		$data->alamat2_pemesan =  (\Request::get('alamat2_pemesan'));
		$data->nama_penerima =  (\Request::get('nama_penerima'));
		$data->telepon_penerima =  (\Request::get('telepon_penerima'));
		$data->email_penerima =  (\Request::get('email_penerima'));
		$data->alamat_penerima =  (\Request::get('alamat_penerima'));
		$data->negara_penerima =  (\Request::get('negara_penerima'));
		$data->propinsi_penerima =  (\Request::get('propinsi_penerima'));
		$data->kode_pos_penerima =  (\Request::get('kode_pos_penerima'));
		$data->catatan_tambahan =  (\Request::get('catatan_tambahan'));
		$data->save(); 

		\Session::put('id_data_saved', $data->id);


		$isiCart = DB::table('cart')
	                    ->where('id_user', (\Session::get('id')))
	                    ->where('status', 'unremove')
	                    ->get();

			return view('checkout',compact('isiCart'));
		return view('checkout');
	}

	public function addFailed()
	{
        	$str = "Tambahkan Sepatu yang Berbeda!";
        	return view("status.failed",compact("str"));
	}
	

	public function addSuccess()
	{
    	 $str = "Berhasil Menambahkan ke Cart!";
    	return view("status.success",compact("str"));
	}

	public function redirectConfirm($id)
	{
		if(\Session::get('peran')==1){
			return redirect('home');
		}
		try{
			\Session::put('id_product', $id);
			return redirect("confirm");
		} catch (\Exception $e) {
        	return redirect("loginrequired");
		}
	}

	public function confirmation()
	{
		$id = \Session::get('id_product');
		$product = Product::find($id);
		$product->harga = ProductController::writeHarga($product->harga);
		
		return view('confirm',compact('product'));



	}
	public function cartConfirmed(){
		try{
			$cartExist = DB::table('cart')
	                    ->where('id_user', \Session::get('id'))
	                    ->where('id_product', (\Request::get('id_product')))
	                    ->where('ukuran', (\Request::get('ukuran')))
	                    ->where('status', 'unremove')
	                    ->first();

			if($cartExist==null){
				$cart = new Cart;
				$cart->id_user = \Session::get('id');
				$cart->id_product = (\Request::get('id_product'));
				$cart->jumlah = (\Request::get('jumlah'));
				$cart->ukuran = (\Request::get('ukuran'));

				$cart->save();
				return redirect('addsuccess');
			}else{
				return redirect('addfailed');
			}	
		} catch (\Exception $e) {
			$str = "Anda harus login untuk menggunakan cart.";
			return view('status.loginrequired',compact('str'));
		}
	}

	public function delete($id)
	{
		$cartDelete = DB::table('cart')
                    ->where('id_user', \Session::get('id'))
                    ->where('id_product', $id)
                    ->first();
		$cart = Cart::find($cartDelete->id);
		$cart->delete();
		return redirect('cart');
	}

}
