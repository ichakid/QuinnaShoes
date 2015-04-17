<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesananTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pesanan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer ('id_user')->unsigned();
			$table->integer ('id_detail_pemesanan')->default(0)->unsigned();
			$table->string('nama_gambar');
			$table->string ('deadline');
			$table->string ('deskripsi_pemesanan');
			$table->string ('alamat');
			$table->string ('jenis_pembayaran');
			$table->integer('jumlah')->default(1);
			$table->string('deskripsi_ukuran');
			$table->string('no_telepon');
			$table->string('status')->default('Pending');
			$table->string('deleted')->default('false');
			$table->integer('total_bayar')->default(0);
			$table->string('tipe')->default('pesanan');
			$table->timestamps();
		});

		Schema::table('pesanan', function($table) {
			$table  ->foreign('id_user')
					->references('id')->on('user')
					->onDelete('cascade');
			$table  ->foreign('id_detail_pemesanan')
					->references('id')->on('detail_pemesanan')
					->onDelete('cascade');
	    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::drop('cart');
		// Schema::drop('penjualan');
		Schema::drop('pesanan');
	}

}
