<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
		{
		
		//$table->string('email')->unique();
		//$table->unique('email');
		//$table->string('password');

		});


		Schema::table('lists', function($table)
		{
		$table->integer('user_id')->unsigned()->nullable();

		$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('listas', function($table)
		{
			$table->dropForeign('user_id');
			$table->dropColumn('user_id');
		});

		Schema::dropIfExists('users');
	}

}
