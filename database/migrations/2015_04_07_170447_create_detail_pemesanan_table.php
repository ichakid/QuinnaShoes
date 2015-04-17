<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPemesananTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detail_pemesanan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer ('id_user')->unsigned();
			$table->string('nama_pemesan');
			$table->string('telepon_pemesan');
			$table->string('email_pemesan');
			$table->string('alamat1_pemesan');
			$table->string('alamat2_pemesan')->default('tidak_diisi');
			$table->string('nama_penerima');
			$table->string('telepon_penerima');
			$table->string('email_penerima');
			$table->string('alamat_penerima');
			$table->string('negara_penerima');
			$table->string('propinsi_penerima');
			$table->string('kode_pos_penerima');
			$table->string('catatan_tambahan')->default('tidak_diisi');
			$table->timestamps();
		});

		Schema::table('detail_pemesanan', function($table) {
			$table  ->foreign('id_user')
					->references('id')->on('user')
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
		Schema::drop('detail_pemesanan');
	}

}
