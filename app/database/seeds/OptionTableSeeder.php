<?php

class OptionTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('options')->delete();
        Option::create(array(
            'option_id' => 'website_title',
            'option_name' => 'Website Title',
            'description' => 'Title of your website, it will appear at the top of every page',
            'type' => 'text',
            'default'=> 'Pong Lan Software',
            'value' => 'Pong Lan Software'
        ));
    }

}
