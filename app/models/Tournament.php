<?php

class Tournament extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'lan_id' => 'required',
		'name' => 'required',
		'start_time' => 'required',
		'end_time' => 'required',
		'type' => 'required',
		'allow_teams' => 'required',
		'assigned_admin' => 'required'
	);
}
