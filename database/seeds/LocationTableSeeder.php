<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert(
            array(
                'address' => 'Islamabad f8/1',
                'long' => '73.035457',
                'lat' => '33.707338',
                'event_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('locations')->insert(
            array(
                'address' => 'Islamabad f8/4',
                'long' => '73.046486',
                'lat' => '33.709051',
                'event_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('locations')->insert(
            array(
                'address' => 'Islamabad f7/2',
                'long' => '73.059661',
                'lat' => '33.705553',
                'event_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('locations')->insert(
            array(
                'address' => 'Islamabad f7/2 b',
                'long' => '73.060863',
                'lat' => '33.705731',
                'event_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('locations')->insert(
            array(
                'address' => 'Islamabad f6',
                'long' => '73.074982',
                'lat' => '33.725365',
                'event_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
    }
}
