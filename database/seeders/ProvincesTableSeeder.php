<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provinces')->delete();
        
        \DB::table('provinces')->insert(array (
            0 => 
            array (
                'id' => 24,
                'name' => 'Western Province',
                'created_at' => '2021-06-23 15:22:07',
                'updated_at' => '2021-06-23 15:22:07',
            ),
            1 => 
            array (
                'id' => 23,
                'name' => 'Southern Province',
                'created_at' => '2021-06-23 15:22:07',
                'updated_at' => '2021-06-23 15:22:07',
            ),
            2 => 
            array (
                'id' => 22,
                'name' => 'Kigali City',
                'created_at' => '2021-06-23 15:22:07',
                'updated_at' => '2021-06-23 15:22:07',
            ),
            3 => 
            array (
                'id' => 25,
                'name' => 'Northern Province',
                'created_at' => '2021-06-23 15:22:07',
                'updated_at' => '2021-06-23 15:22:07',
            ),
            4 => 
            array (
                'id' => 26,
                'name' => 'Eastern Province',
                'created_at' => '2021-06-23 15:22:07',
                'updated_at' => '2021-06-23 15:22:07',
            ),
        ));
        
        
    }
}