<?php namespace App\Http\Controllers;
use App\Http\Requests\Request;
use App\User;
use App\Product;
use DB;
use Auth;
class HomeController extends Controller {

	public function index()
	{
		$arrayProductHotItem = DB::table('product')
                    ->where('kategori', 'hot_item')
                    ->get();
        foreach ($arrayProductHotItem as $product) {
        	$product->harga = ProductController::writeHarga($product->harga);
        }
        $arrayProductSlider = DB::table('product')
                    ->where('kategori', 'slider')
                    ->get();
		return view('home',['arrayProductHotItem' => $arrayProductHotItem, 'arrayProductSlider'=> $arrayProductSlider]);
	}

	public function login()
	{
		return view('login');
	}

	public function logout()
	{
		return view('logout');
	}

	public function account()
	{
		$user = DB::table('user')
                    ->where('id', (\Session::get('id')))
                    ->first();
		return view('account',compact('user'));
	}

	public function clean()
	{
		\Session::flush();
		return redirect('home');
	}

	public function detail($id)
	{
		\Session::put('id_product', $id);
		return redirect('detailredirect');
	}

	public function detailRedirect()
	{
		$product = Product::find(\Session::get('id_product'));
		return view('detail',compact('product'));
	}


	public function loginRequired()
	{
		$str = "Silahkan Login Untuk Menggunakan Cart";
		return view('status.loginrequired', compact('str'));
	}

	public function updatedUser()
	{
		try{
             DB::table('user')
            ->where('id', \Session::get('id'))
            ->update(array('nama' => (\Request::get('nama')), 'email' => (\Request::get('email')),'password'=>(\Request::get('password'))));

            $user = User::find(\Session::get('id'));
			\Session::flush();
			
        	\Session::put('id', $user->id);
        	\Session::put('peran', $user->peran);
        	\Session::put('nama', $user->nama);
			\Session::put('uploaded', "false");

        	 $str = "Berhasil Mengupdate Akun";
        	return view("status.success",compact("str"));
        } catch (\Exception $e) {
        	$str = "Gagal Mengupdate Akun";
        	return view("status.failed",compact("str"));
		}
	}

	public function addUser()
	{
		try{
			$user = new User;
			$user->nama = (\Request::get('nama'));
			$user->email = (\Request::get('email'));
			$user->password = (\Request::get('password'));
			$user->save();
        	 $str = "Berhasil Mendaftarkan Akun";
        	return view("status.success",compact("str"));
        } catch (\Exception $e) {
        	$str = "Gagal Mendaftarkan Akun";
        	return view("status.failed",compact("str"));
		}
	}

	public function checkUser()
	{
		try{
			$user = DB::table('user')
	                    ->where('email', (\Request::get('email')))
	                    ->first();
	        $result =  strcmp($user->password,(\Request::get('password')));
	        if($result===0){
	        	\Session::put('id', $user->id);
	        	\Session::put('peran', $user->peran);
	        	\Session::put('nama', $user->nama);
				\Session::put('uploaded', "false");
	        	$str = "Selamat ".$user->nama.". Anda berhasil login";
	        	if($user->peran == 1){
	        		$str = $str." sebagai administrator.";
	        	}else{
	        		$str = $str."! Selamat berbelanja!";
	        	}
	        	return view("status.success",compact("str"));
	        }else{
	        	$str = "Anda tidak berhasil login. Cek kembali password Anda!";
            	return view("status.failed",compact("str"));
		    }
		}catch (\Exception $e) {
        	$str = "Anda Tidak Berhasil Login";
        	return view("status.failed",compact("str"));
		}
	}

}
