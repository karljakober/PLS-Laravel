<?php

class SeatingChartTile extends Eloquent {
    protected $table = 'seating_chart_tiles';
    public $timestamps = false;
    protected $guarded = array();

    public static $rules = array(
        'seating_chart_id' => 'required',
        'x' => 'required',
        'y' => 'required',
        'tile_id' => 'required'
    );
}
