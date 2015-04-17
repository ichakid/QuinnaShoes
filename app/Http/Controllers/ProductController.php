<?php namespace App\Http\Controllers;
use App\Http\Requests\Request;
use App\User;
use App\Product;
use App\Input;
use DB;
use Auth;
class ProductController extends Controller {
	public static function writeHarga($harga){
		$result = "";
		$n = strlen($harga);
		for ($i=$n; $i>3; $i -= 3){
			$result = "." . substr($harga, $i-3, 3) . $result;
		}
		$result = substr($harga, 0, $i) . $result;
		return $result;
	}

	public function showListProduct(){
		$arrayProduct = Product::all();
		foreach ($arrayProduct as $product) {
			$product->harga = ProductController::writeHarga($product->harga);
		}
		return view ("listproduct",compact('arrayProduct'));
	}

	public function deleteProduct($id){
		$deleteProduct = Product::find($id);
		$deleteProduct->delete();
		return redirect('listproduct');
	}

	public function uploadProduct(){
		$product = new Product;
		$product->nama_gambar = (\Request::get('nama_gambar'));
		$product->model = (\Request::get('model'));
		$product->deskripsi = (\Request::get('deskripsi'));
		$product->harga = (\Request::get('harga'));
		$product->kategori = (\Request::get('kategori'));
		$product->save();
    	 $str = "Berhasil Menambahkan Product";
    	return view("status.success",compact("str"));
	}

	public function addProduct(){
		$str = "empty.jpg";
		\Session::put('uploaded', "false");

		return view('addproduct',compact('str'));
	}

	public function editProductRedirect()
	{
		$id = \Session::get('edit_product');
		$product = Product::find($id);
		$str = $product->nama_gambar;
		return view('editproduct',compact('str'),compact('product'));
	}

	public function editProduct($id)
	{

		\Session::put('edit_product', $id);
		return redirect('editproductredirect');
	}
	
	public function checkEditProductRedirect()
	{
		$id = \Session::get('edit_product');
		$product = Product::find($id);

		$product->model = \Request::get('model');
		$product->deskripsi = \Request::get('deskripsi');
		$product->harga = \Request::get('harga');
		$product->nama_gambar = \Request::get('nama_gambar');
		$product->kategori = \Request::get('kategori');
		$product->save();
		return redirect('listproduct');
	}

	public function upload() {
		\Session::put('uploaded', "true");
		$nama_gambar = (\Request::file("image")->getClientOriginalName());
		$mime_type = (\Request::file("image")->getClientMimeType());
		$ekstensi = (\Request::file("image")->guessClientExtension());
		$path = (\Request::file("image")->getRealPath());
		//dd($path);

		\Request::file('image')->move(__DIR__.'/../'.'/../'.'/../'.'public/images/home',\Request::file('image')->getClientOriginalName());
		//dd(\Request::all());

		$str = $nama_gambar;
		return view("addproduct",compact('str'));
	}

}

