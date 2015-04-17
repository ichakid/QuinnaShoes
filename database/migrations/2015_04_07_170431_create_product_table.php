<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Product;
class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama_gambar')->unique();
			$table->string('deskripsi', 225);
			$table->string('model', 225);
			$table->integer('harga');
			$table->string('kategori');
			$table->timestamps();
		});

		$product1 = new Product;
		$product1->nama_gambar = "product1.jpg";
		$product1->deskripsi="Sepatu ini sangat awet dan tahan injak.";
		$product1->model="Sepatu High Heels";
		$product1->harga = "200000";
		$product1->kategori = "hot_item";
		$product1->save();

		$product2 = new Product;
		$product2->nama_gambar = "product2.jpg";
		$product2->deskripsi="Sepatu ini sangat awet dan tahan injak.";
		$product2->harga = "250000";
		$product2->model="Sepatu High Heels";
		$product2->kategori = "hot_item";
		$product2->save();

		$product3 = new Product;
		$product3->nama_gambar = "product3.jpg";
		$product3->deskripsi="Sepatu ini sangat awet dan tahan injak.";
		$product3->harga = "350000";
		$product3->kategori = "hot_item";
		$product3->model="Sepatu High Heels";
		$product3->save();

		$product4 = new Product;
		$product4->nama_gambar = "product4.jpg";
		$product4->deskripsi="Sepatu ini sangat awet dan tahan injak.";
		$product4->harga = "270000";
		$product4->kategori = "hot_item";
		$product4->model="Sepatu High Heels";
		$product4->save();

		$product5 = new Product;
		$product5->nama_gambar = "product5.jpg";
		$product5->deskripsi="Sepatu ini sangat awet dan tahan injak.";
		$product5->harga = "150000";
		$product5->kategori = "hot_item";
		$product5->model="Sepatu High Heels";
		$product5->save();

		$product6 = new Product;
		$product6->nama_gambar = "product6.jpg";
		$product6->deskripsi="Sepatu ini sangat awet dan tahan injak.";
		$product6->harga = "130000";
		$product6->kategori = "hot_item";
		$product6->model="Sepatu High Heels";
		$product6->save();

		$product7 = new Product;
		$product7->nama_gambar = "shoes1.jpg";
		$product7->deskripsi="Sepatu ini sangat awet dan tahan injak.";
		$product7->harga = "290000";
		$product7->kategori = "slider";
		$product7->model="Sepatu High Heels";
		$product7->save();

		$product8 = new Product;
		$product8->nama_gambar = "shoes2.jpg";
		$product8->deskripsi="Sepatu ini sangat awet dan tahan injak.";
		$product8->harga = "320000";
		$product8->kategori = "slider";
		$product8->model="Sepatu High Heels";
		$product8->save();

		$product9 = new Product;
		$product9->nama_gambar = "shoes3.jpg";
		$product9->deskripsi="Sepatu ini sangat awet dan tahan injak.";
		$product9->harga = "240000";
		$product9->kategori = "slider";
		$product9->model="Sepatu High Heels";
		$product9->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::drop('cart');
		Schema::drop('product');
	}


}
