<?php

class Server extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'lan_id' => 'required',
		'name' => 'required',
		'address' => 'required',
		'user_id' => 'required'
	);
}
