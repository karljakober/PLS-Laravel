<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lans', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name', 255);
			$table->integer('seating_chart_id');

			$table->dateTime('start_time');
			$table->dateTime('end_time');

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
		Schema::drop('lans');

	}

}
