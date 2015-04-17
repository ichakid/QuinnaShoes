<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('penjualan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer ('id_user')->unsigned();
			$table->integer('id_pesanan')->unsigned();
			$table->integer('total_bayar');
			$table->timestamps();
		});

		Schema::table('penjualan', function($table) {
			$table  ->foreign('id_user')
					->references('id')->on('user')
					->onDelete('cascade');
			$table  ->foreign('id_pesanan')
					->references('id')->on('pesanan')
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
		Schema::drop('penjualan');
	}

}
