<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->integer('peran')->default(2);
			//1 = administrator
			//2 = pemesan
			$table->timestamps();
		});

		$user1 = new User;
		$user1->nama = "Daniar Heri Kurniawan";
		$user1->email = "daniar.h.k@gmail.com";
		$user1->peran = 1;
		$user1->password = "1"; 
		$user1->save();

		$user2 = new User;
		$user2->nama = "Fandi Azam";
		$user2->email = "fandi@gmail.com";
		$user2->peran = 2;
		$user2->password = "1";
		$user2->save();

		$user3 = new User;
		$user3->nama = "Ridwan Kamil";
		$user3->email = "rk@gmail.com";
		$user3->peran = 1;
		$user3->password = "1";
		$user3->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::drop('detail_pemesanan');
		// Schema::drop('penjualan');
		// Schema::drop('cart');
		// Schema::drop('pesanan');
		Schema::drop('user');
	}

}
