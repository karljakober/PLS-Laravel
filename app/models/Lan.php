<?php

class Lan extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
        'name' => 'required',
        'start_time' => 'required',
        'end_time' => 'required'
    );

    public static function active($upcoming = false) {
        //if upcoming is true, it will return current lan or future lan
        //if upcoming is false, it will return current lan or previous lan
        if ($upcoming) {
            $lan = Lan::where('end_time', '>', date('Y-m-d H:i:s'))->where('start_time', '<', date('Y-m-d H:i:s'))->first();
            if (!isset($lan) || !$lan) {
                $lan = Lan::where('start_time', '>', date('Y-m-d H:i:s'))->first();
            }
            if (!isset($lan) || !$lan) {
              return false;
            }

        } else {
            $lan = Lan::where('end_time', '>', date('Y-m-d H:i:s'))->where('start_time', '<', date('Y-m-d H:i:s'))->first();
            if(!isset($curlan) || !$curLan) {
                $lan = Lan::where('start_time', '<', date('Y-m-d H:i:s'))->first();
            }
        }
        return $lan;
    }

    public static function next() {
        $lan = Lan::where('start_time', '>', date('Y-m-d H:i:s'))->first();
    }

    public static function previous() {
        $lan = Lan::where('start_time', '<', date('Y-m-d H:i:s'))->first();
    }


}
