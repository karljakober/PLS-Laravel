<?php

class SeatingChartTile extends Eloquent {
    protected $table = 'seating_chart_tiles';
    public $timestamps = false;
    protected $fillable = array('seating_chart_id', 'x', 'y', 'tile_id', 'seat_number');

    public static $rules = array(
        'seating_chart_id' => 'required',
        'x' => 'required',
        'y' => 'required',
        'tile_id' => 'required'
    );
}
