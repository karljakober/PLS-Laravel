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
        Option::create(array(
            'option_id' => 'student_priority_seating',
            'option_name' => 'Student Seating Priority',
            'description' => 'If youd like to restrict seating to students, or people with a specific email address domain, enable this. While it is enabled, people not fitting the domain requirement can opt in to a open seat notification that will be sent out when this option is disabled.',
            'type' => 'boolean',
            'default'=> '0',
            'value' => '0'
        ));
        Option::create(array(
            'option_id' => 'student_email_domain',
            'option_name' => 'Studen Email Address Domain',
            'description' => 'The domain PLS checks for if priority seating is enabled.',
            'type' => 'text',
            'default'=> '@uwstout.edu',
            'value' => '@uwstout.edu'
        ));
    }

}
