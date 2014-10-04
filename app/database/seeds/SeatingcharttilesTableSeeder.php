<?php

class SeatingcharttilesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('seating_chart_tiles')->delete();
        /*SeatingChartTile::create(array(
            'seating_chart_id' => '1',
            'x' => '1',
            'y' => '1',
            'tile_id' => 'wall'
        ));*/
    }
}
