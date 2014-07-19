<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'username' => 'Blaine0002',
			'email'    => 'jakoberk@uwstout.edu',
			'password' => Hash::make('password'),
            'admin'    => true,
            'twitch_id'=> 'Ininjaurloot',
            'steam_id' => 'blaine0002'
		));
	}

}
