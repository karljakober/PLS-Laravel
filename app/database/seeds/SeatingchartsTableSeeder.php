<?php

class SeatingchartsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('seating_charts')->delete();
		SeatingChart::create(array(
			'name' => 'Crystal Ball Room',
			'width' => '50',
			'height' => '50'
		));
	}
}
