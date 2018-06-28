<?php

use Illuminate\Database\Seeder;

class StandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('stands')->insert(
            array(
                'price' => 320.00,
                'title' => 'Stand 1',
                'image' => 'stand1.jpg',
                'hall_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('stands')->insert(
            array(
                'price' => 400.00,
                'title' => 'Stand 2',
                'image' => 'stand2.jpg',
                'hall_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('stands')->insert(
            array(
                'price' => 300.60,
                'title' => 'Stand 3',
                'image' => 'stand3.jpg',
                'hall_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('stands')->insert(
            array(
                'price' => 305.90,
                'title' => 'Stand 4',
                'image' => 'stand4.jpg',
                'hall_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('stands')->insert(
            array(
                'price' => 105.90,
                'title' => 'Stand 5',
                'image' => 'stand5.jpg',
                'hall_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('stands')->insert(
            array(
                'price' => 205.90,
                'title' => 'Stand 6',
                'image' => 'stand6.jpg',
                'hall_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('stands')->insert(
            array(
                'price' => 805.90,
                'title' => 'Stand 7',
                'image' => 'stand7.jpg',
                'hall_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('stands')->insert(
            array(
                'price' => 105.90,
                'title' => 'Stand 8',
                'image' => 'stand8.jpg',
                'hall_id' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('stands')->insert(
            array(
                'price' => 655.90,
                'title' => 'Stand 9',
                'image' => 'stand9.jpg',
                'hall_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
        DB::table('stands')->insert(
            array(
                'price' => 605.90,
                'title' => 'Stand 10',
                'image' => 'stand10.jpg',
                'hall_id' => 5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            )
        );
    }
}
