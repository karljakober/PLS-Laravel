<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('username', 32);
			$table->string('email', 320);
			$table->string('password', 64);
			$table->boolean('admin')->default(false);

			$table->string('twitch_id', 255);
			$table->string('steam_id', 255);
			$table->string('forum_id', 255);

			$table->rememberToken();

			$table->timestamps();
		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::drop('users');
	}

}
