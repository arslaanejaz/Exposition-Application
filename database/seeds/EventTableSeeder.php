<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert(
            array(
                'name' => 'Event 1',
                'mail_sent' => false,
                'start_date_time' => '2017-10-16 10:00:00',
                'end_date_time' => '2017-10-17 15:00:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('events')->insert(
            array(
                'name' => 'Event 2',
                'mail_sent' => false,
                'start_date_time' => '2017-10-17 10:00:00',
                'end_date_time' => '2017-10-17 16:00:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('events')->insert(
            array(
                'name' => 'Event 3',
                'mail_sent' => false,
                'start_date_time' => '2017-10-18 10:00:00',
                'end_date_time' => '2017-10-20 16:00:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
    }
}
