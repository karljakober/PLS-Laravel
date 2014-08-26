<?php

class LansTableSeeder extends Seeder {

    public function run()
    {
        DB::table('lans')->delete();
        Lan::create(array(
            'name' => 'Pong Lan',
            'start_time' => date("Y-m-d H:i:s"),
            'end_time' => date('Y-m-d H:i:s', strtotime('+1 week')),
            'seating_chart_id' => '1'
        ));
    }

}
