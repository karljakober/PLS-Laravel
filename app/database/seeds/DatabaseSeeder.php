<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('OptionTableSeeder');
		$this->call('NewsTableSeeder');
		$this->call('ServersTableSeeder');
		$this->call('TournamentsTableSeeder');
		$this->call('SeatingchartsTableSeeder');
		$this->call('SeatingcharttilesTableSeeder');
		$this->call('LansTableSeeder');
	}

}
