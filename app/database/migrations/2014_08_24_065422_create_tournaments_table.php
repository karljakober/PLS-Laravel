<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTournamentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tournaments', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('lan_id');
			$table->string('name');
			$table->date('start_time');
			$table->date('end_time');
			$table->string('type');
			$table->boolean('allow_teams');
			$table->integer('assigned_admin');
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
		Schema::drop('tournaments');
	}

}
