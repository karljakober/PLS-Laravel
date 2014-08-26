<?php

class SeatingChart extends Eloquent {
	protected $table = 'seating_charts';

	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'width' => 'required',
		'height' => 'required'
	);
}
