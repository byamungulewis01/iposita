<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('districts')->delete();
        
        \DB::table('districts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'province_id' => 22,
                'name' => 'Nyarugenge',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            1 => 
            array (
                'id' => 2,
                'province_id' => 22,
                'name' => 'Gasabo',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            2 => 
            array (
                'id' => 3,
                'province_id' => 22,
                'name' => 'Kicukiro',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            3 => 
            array (
                'id' => 4,
                'province_id' => 23,
                'name' => 'Nyanza',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            4 => 
            array (
                'id' => 5,
                'province_id' => 23,
                'name' => 'Gisagara',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            5 => 
            array (
                'id' => 6,
                'province_id' => 23,
                'name' => 'Nyaruguru',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            6 => 
            array (
                'id' => 7,
                'province_id' => 23,
                'name' => 'Huye',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            7 => 
            array (
                'id' => 8,
                'province_id' => 23,
                'name' => 'Nyamagabe',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            8 => 
            array (
                'id' => 9,
                'province_id' => 23,
                'name' => 'Ruhango',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            9 => 
            array (
                'id' => 10,
                'province_id' => 23,
                'name' => 'Muhanga',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            10 => 
            array (
                'id' => 11,
                'province_id' => 23,
                'name' => 'Kamonyi',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            11 => 
            array (
                'id' => 12,
                'province_id' => 24,
                'name' => 'Karongi',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            12 => 
            array (
                'id' => 13,
                'province_id' => 24,
                'name' => 'Rutsiro',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            13 => 
            array (
                'id' => 14,
                'province_id' => 24,
                'name' => 'Rubavu',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            14 => 
            array (
                'id' => 15,
                'province_id' => 24,
                'name' => 'Nyabihu',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            15 => 
            array (
                'id' => 16,
                'province_id' => 24,
                'name' => 'Ngororero',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            16 => 
            array (
                'id' => 17,
                'province_id' => 24,
                'name' => 'Rusizi',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            17 => 
            array (
                'id' => 18,
                'province_id' => 24,
                'name' => 'Nyamasheke',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            18 => 
            array (
                'id' => 19,
                'province_id' => 25,
                'name' => 'Rulindo',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            19 => 
            array (
                'id' => 20,
                'province_id' => 25,
                'name' => 'Gakenke',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            20 => 
            array (
                'id' => 21,
                'province_id' => 25,
                'name' => 'Musanze',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            21 => 
            array (
                'id' => 22,
                'province_id' => 25,
                'name' => 'Burera',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            22 => 
            array (
                'id' => 23,
                'province_id' => 25,
                'name' => 'Gicumbi',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            23 => 
            array (
                'id' => 24,
                'province_id' => 26,
                'name' => 'Rwamagana',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            24 => 
            array (
                'id' => 25,
                'province_id' => 26,
                'name' => 'Nyagatare',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            25 => 
            array (
                'id' => 26,
                'province_id' => 26,
                'name' => 'Gatsibo',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            26 => 
            array (
                'id' => 27,
                'province_id' => 26,
                'name' => 'Kayonza',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            27 => 
            array (
                'id' => 28,
                'province_id' => 26,
                'name' => 'Kirehe',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            28 => 
            array (
                'id' => 29,
                'province_id' => 26,
                'name' => 'Ngoma',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
            29 => 
            array (
                'id' => 30,
                'province_id' => 26,
                'name' => 'Bugesera',
                'created_at' => '2021-06-23 15:24:09',
                'updated_at' => '2021-06-23 15:24:09',
            ),
        ));
        
        
    }
}