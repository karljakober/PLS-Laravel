<?php

class ServersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('servers')->delete();
		Server::create(array(
			'lan_id' => '1',
			'name' => 'Pong Counter Strike GO Server',
			'address' => 'steam://connect/0.0.0.0',
			'additional_info' => '24/7 Gungame',
			'official' => '1',
			'user_id' => '1'
		));
		Server::create(array(
			'lan_id' => '1',
			'name' => 'Unreal Tournament 2003',
			'address' => 'steam://connect/0.0.0.0',
			'additional_info' => 'Instagib CTF',
			'official' => '0',
			'user_id' => '1'
		));
	}

}
