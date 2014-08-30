<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSeatingcharttilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seating_chart_tiles', function(Blueprint $table) {
			$table->integer('seating_chart_id');
			$table->integer('x');
			$table->integer('y');
			$table->string('tile_id', 25);
			$table->integer('seat_number')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('seating_chart_tiles');
	}

}
