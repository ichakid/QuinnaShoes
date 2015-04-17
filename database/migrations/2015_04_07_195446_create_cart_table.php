<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cart', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer ('id_user')->unsigned();
			$table->integer('jumlah')->default(1);
			$table->integer('id_product')->unsigned();
			$table->integer('ukuran');
			$table->integer('id_pesanan')->default(0)->unsigned();
			$table->string('status')->default('unremove');
			$table->timestamps();
		});

		Schema::table('cart', function($table) {
			$table  ->foreign('id_user')
					->references('id')->on('user')
					->onDelete('cascade');
			$table  ->foreign('id_product')
					->references('id')->on('product')
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
		Schema::drop('cart');
	}

}
