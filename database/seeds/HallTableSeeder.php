<?php

use Illuminate\Database\Seeder;

class HallTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('halls')->insert(
            array(
                'name' => 'Hall 1',
                'image' => 'hall1.png',
                'location_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('halls')->insert(
            array(
                'name' => 'Hall 2',
                'image' => 'hall2.png',
                'location_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('halls')->insert(
            array(
                'name' => 'Hall 3',
                'image' => 'hall3.png',
                'location_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('halls')->insert(
            array(
                'name' => 'Hall 4',
                'image' => 'hall4.png',
                'location_id' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('halls')->insert(
            array(
                'name' => 'Hall 5',
                'image' => 'hall5.png',
                'location_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
    }
}
