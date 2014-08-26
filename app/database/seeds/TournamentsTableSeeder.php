<?php

class TournamentsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tournaments')->delete();
		Tournament::create(array(
			'lan_id' => '1',
			'name' => 'Dota 2',
			'start_time' => date('Y-m-d H:i:s', strtotime('+1 day')),
			'end_time' => date('Y-m-d H:i:s', strtotime('+2 day')),
			'type' => 'Round Robin',
			'allow_teams' => '1',
			'assigned_admin' => '1',

		));
	}

}
