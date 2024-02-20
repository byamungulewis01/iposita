<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('sectors')->delete();

        DB::table('sectors')->insert(array (
            0 =>
            array (
                'id' => 1,
                'district_id' => 1,
                'name' => 'Gitega',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            1 =>
            array (
                'id' => 2,
                'district_id' => 1,
                'name' => 'Kanyinya',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            2 =>
            array (
                'id' => 3,
                'district_id' => 1,
                'name' => 'Kigali',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            3 =>
            array (
                'id' => 4,
                'district_id' => 1,
                'name' => 'Kimisagara',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            4 =>
            array (
                'id' => 5,
                'district_id' => 1,
                'name' => 'Mageregere',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            5 =>
            array (
                'id' => 6,
                'district_id' => 1,
                'name' => 'Muhima',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            6 =>
            array (
                'id' => 7,
                'district_id' => 1,
                'name' => 'Nyakabanda',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            7 =>
            array (
                'id' => 8,
                'district_id' => 1,
                'name' => 'Nyamirambo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            8 =>
            array (
                'id' => 9,
                'district_id' => 1,
                'name' => 'Nyarugenge',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            9 =>
            array (
                'id' => 10,
                'district_id' => 1,
                'name' => 'Rwezamenyo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            10 =>
            array (
                'id' => 11,
                'district_id' => 2,
                'name' => 'Bumbogo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            11 =>
            array (
                'id' => 12,
                'district_id' => 2,
                'name' => 'Gatsata',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            12 =>
            array (
                'id' => 13,
                'district_id' => 2,
                'name' => 'Gikomero',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            13 =>
            array (
                'id' => 14,
                'district_id' => 2,
                'name' => 'Gisozi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            14 =>
            array (
                'id' => 15,
                'district_id' => 2,
                'name' => 'Jabana',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            15 =>
            array (
                'id' => 16,
                'district_id' => 2,
                'name' => 'Jali',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            16 =>
            array (
                'id' => 17,
                'district_id' => 2,
                'name' => 'Kacyiru',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            17 =>
            array (
                'id' => 18,
                'district_id' => 2,
                'name' => 'Kimihurura',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            18 =>
            array (
                'id' => 19,
                'district_id' => 2,
                'name' => 'Kimironko',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            19 =>
            array (
                'id' => 20,
                'district_id' => 2,
                'name' => 'Kinyinya',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            20 =>
            array (
                'id' => 21,
                'district_id' => 2,
                'name' => 'Ndera',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            21 =>
            array (
                'id' => 22,
                'district_id' => 2,
                'name' => 'Nduba',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            22 =>
            array (
                'id' => 23,
                'district_id' => 2,
                'name' => 'Remera',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            23 =>
            array (
                'id' => 24,
                'district_id' => 2,
                'name' => 'Rusororo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            24 =>
            array (
                'id' => 25,
                'district_id' => 2,
                'name' => 'Rutunga',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            25 =>
            array (
                'id' => 26,
                'district_id' => 3,
                'name' => 'Gahanga',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            26 =>
            array (
                'id' => 27,
                'district_id' => 3,
                'name' => 'Gatenga',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            27 =>
            array (
                'id' => 28,
                'district_id' => 3,
                'name' => 'Gikondo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            28 =>
            array (
                'id' => 29,
                'district_id' => 3,
                'name' => 'Kagarama',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            29 =>
            array (
                'id' => 30,
                'district_id' => 3,
                'name' => 'Kanombe',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            30 =>
            array (
                'id' => 31,
                'district_id' => 3,
                'name' => 'Kicukiro',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            31 =>
            array (
                'id' => 32,
                'district_id' => 3,
                'name' => 'Kigarama',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            32 =>
            array (
                'id' => 33,
                'district_id' => 3,
                'name' => 'Masaka',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            33 =>
            array (
                'id' => 34,
                'district_id' => 3,
                'name' => 'Niboye',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            34 =>
            array (
                'id' => 35,
                'district_id' => 3,
                'name' => 'Nyarugunga',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            35 =>
            array (
                'id' => 36,
                'district_id' => 4,
                'name' => 'Busasamana',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            36 =>
            array (
                'id' => 37,
                'district_id' => 4,
                'name' => 'Busoro',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            37 =>
            array (
                'id' => 38,
                'district_id' => 4,
                'name' => 'Cyabakamyi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            38 =>
            array (
                'id' => 39,
                'district_id' => 4,
                'name' => 'Kibilizi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            39 =>
            array (
                'id' => 40,
                'district_id' => 4,
                'name' => 'Kigoma',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            40 =>
            array (
                'id' => 41,
                'district_id' => 4,
                'name' => 'Mukingo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            41 =>
            array (
                'id' => 42,
                'district_id' => 4,
                'name' => 'Muyira',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            42 =>
            array (
                'id' => 43,
                'district_id' => 4,
                'name' => 'Ntyazo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            43 =>
            array (
                'id' => 44,
                'district_id' => 4,
                'name' => 'Nyagisozi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            44 =>
            array (
                'id' => 45,
                'district_id' => 4,
                'name' => 'Rwabicuma',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            45 =>
            array (
                'id' => 46,
                'district_id' => 5,
                'name' => 'Gikonko',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            46 =>
            array (
                'id' => 47,
                'district_id' => 5,
                'name' => 'Gishubi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            47 =>
            array (
                'id' => 48,
                'district_id' => 5,
                'name' => 'Kansi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            48 =>
            array (
                'id' => 49,
                'district_id' => 5,
                'name' => 'Kibirizi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            49 =>
            array (
                'id' => 50,
                'district_id' => 5,
                'name' => 'Kigembe',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            50 =>
            array (
                'id' => 51,
                'district_id' => 5,
                'name' => 'Mamba',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            51 =>
            array (
                'id' => 52,
                'district_id' => 5,
                'name' => 'Muganza',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            52 =>
            array (
                'id' => 53,
                'district_id' => 5,
                'name' => 'Mugombwa',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            53 =>
            array (
                'id' => 54,
                'district_id' => 5,
                'name' => 'Mukindo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            54 =>
            array (
                'id' => 55,
                'district_id' => 5,
                'name' => 'Musha',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            55 =>
            array (
                'id' => 56,
                'district_id' => 5,
                'name' => 'Ndora',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            56 =>
            array (
                'id' => 57,
                'district_id' => 5,
                'name' => 'Nyanza',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            57 =>
            array (
                'id' => 58,
                'district_id' => 5,
                'name' => 'Save',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            58 =>
            array (
                'id' => 59,
                'district_id' => 6,
                'name' => 'Busanze',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            59 =>
            array (
                'id' => 60,
                'district_id' => 6,
                'name' => 'Cyahinda',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            60 =>
            array (
                'id' => 61,
                'district_id' => 6,
                'name' => 'Kibeho',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            61 =>
            array (
                'id' => 62,
                'district_id' => 6,
                'name' => 'Kivu',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            62 =>
            array (
                'id' => 63,
                'district_id' => 6,
                'name' => 'Mata',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            63 =>
            array (
                'id' => 64,
                'district_id' => 6,
                'name' => 'Muganza',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            64 =>
            array (
                'id' => 65,
                'district_id' => 6,
                'name' => 'Munini',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            65 =>
            array (
                'id' => 66,
                'district_id' => 6,
                'name' => 'Ngera',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            66 =>
            array (
                'id' => 67,
                'district_id' => 6,
                'name' => 'Ngoma',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            67 =>
            array (
                'id' => 68,
                'district_id' => 6,
                'name' => 'Nyabimata',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            68 =>
            array (
                'id' => 69,
                'district_id' => 6,
                'name' => 'Nyagisozi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            69 =>
            array (
                'id' => 70,
                'district_id' => 6,
                'name' => 'Ruheru',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            70 =>
            array (
                'id' => 71,
                'district_id' => 6,
                'name' => 'Ruramba',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            71 =>
            array (
                'id' => 72,
                'district_id' => 6,
                'name' => 'Rusenge',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            72 =>
            array (
                'id' => 73,
                'district_id' => 7,
                'name' => 'Gishamvu',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            73 =>
            array (
                'id' => 74,
                'district_id' => 7,
                'name' => 'Huye',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            74 =>
            array (
                'id' => 75,
                'district_id' => 7,
                'name' => 'Karama',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            75 =>
            array (
                'id' => 76,
                'district_id' => 7,
                'name' => 'Kigoma',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            76 =>
            array (
                'id' => 77,
                'district_id' => 7,
                'name' => 'Kinazi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            77 =>
            array (
                'id' => 78,
                'district_id' => 7,
                'name' => 'Maraba',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            78 =>
            array (
                'id' => 79,
                'district_id' => 7,
                'name' => 'Mbazi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            79 =>
            array (
                'id' => 80,
                'district_id' => 7,
                'name' => 'Mukura',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            80 =>
            array (
                'id' => 81,
                'district_id' => 7,
                'name' => 'Ngoma',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            81 =>
            array (
                'id' => 82,
                'district_id' => 7,
                'name' => 'Ruhashya',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            82 =>
            array (
                'id' => 83,
                'district_id' => 7,
                'name' => 'Rusatira',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            83 =>
            array (
                'id' => 84,
                'district_id' => 7,
                'name' => 'Rwaniro',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            84 =>
            array (
                'id' => 85,
                'district_id' => 7,
                'name' => 'Simbi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            85 =>
            array (
                'id' => 86,
                'district_id' => 7,
                'name' => 'Tumba',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            86 =>
            array (
                'id' => 87,
                'district_id' => 8,
                'name' => 'Buruhukiro',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            87 =>
            array (
                'id' => 88,
                'district_id' => 8,
                'name' => 'Cyanika',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            88 =>
            array (
                'id' => 89,
                'district_id' => 8,
                'name' => 'Gasaka',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            89 =>
            array (
                'id' => 90,
                'district_id' => 8,
                'name' => 'Gatare',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            90 =>
            array (
                'id' => 91,
                'district_id' => 8,
                'name' => 'Kaduha',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            91 =>
            array (
                'id' => 92,
                'district_id' => 8,
                'name' => 'Kamegeri',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            92 =>
            array (
                'id' => 93,
                'district_id' => 8,
                'name' => 'Kibirizi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            93 =>
            array (
                'id' => 94,
                'district_id' => 8,
                'name' => 'Kibumbwe',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            94 =>
            array (
                'id' => 95,
                'district_id' => 8,
                'name' => 'Kitabi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            95 =>
            array (
                'id' => 96,
                'district_id' => 8,
                'name' => 'Mbazi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            96 =>
            array (
                'id' => 97,
                'district_id' => 8,
                'name' => 'Mugano',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            97 =>
            array (
                'id' => 98,
                'district_id' => 8,
                'name' => 'Musange',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            98 =>
            array (
                'id' => 99,
                'district_id' => 8,
                'name' => 'Musebeya',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            99 =>
            array (
                'id' => 100,
                'district_id' => 8,
                'name' => 'Mushubi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            100 =>
            array (
                'id' => 101,
                'district_id' => 8,
                'name' => 'Nkomane',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            101 =>
            array (
                'id' => 102,
                'district_id' => 8,
                'name' => 'Tare',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            102 =>
            array (
                'id' => 103,
                'district_id' => 8,
                'name' => 'Uwinkingi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            103 =>
            array (
                'id' => 104,
                'district_id' => 9,
                'name' => 'Bweramana',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            104 =>
            array (
                'id' => 105,
                'district_id' => 9,
                'name' => 'Byimana',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            105 =>
            array (
                'id' => 106,
                'district_id' => 9,
                'name' => 'Kabagali',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            106 =>
            array (
                'id' => 107,
                'district_id' => 9,
                'name' => 'Kinazi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            107 =>
            array (
                'id' => 108,
                'district_id' => 9,
                'name' => 'Kinihira',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            108 =>
            array (
                'id' => 109,
                'district_id' => 9,
                'name' => 'Mbuye',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            109 =>
            array (
                'id' => 110,
                'district_id' => 9,
                'name' => 'Mwendo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            110 =>
            array (
                'id' => 111,
                'district_id' => 9,
                'name' => 'Ntongwe',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            111 =>
            array (
                'id' => 112,
                'district_id' => 9,
                'name' => 'Ruhango',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            112 =>
            array (
                'id' => 113,
                'district_id' => 10,
                'name' => 'Cyeza',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            113 =>
            array (
                'id' => 114,
                'district_id' => 10,
                'name' => 'Kabacuzi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            114 =>
            array (
                'id' => 115,
                'district_id' => 10,
                'name' => 'Kibangu',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            115 =>
            array (
                'id' => 116,
                'district_id' => 10,
                'name' => 'Kiyumba',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            116 =>
            array (
                'id' => 117,
                'district_id' => 10,
                'name' => 'Muhanga',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            117 =>
            array (
                'id' => 118,
                'district_id' => 10,
                'name' => 'Mushishiro',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            118 =>
            array (
                'id' => 119,
                'district_id' => 10,
                'name' => 'Nyabinoni',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            119 =>
            array (
                'id' => 120,
                'district_id' => 10,
                'name' => 'Nyamabuye',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            120 =>
            array (
                'id' => 121,
                'district_id' => 10,
                'name' => 'Nyarusange',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            121 =>
            array (
                'id' => 122,
                'district_id' => 10,
                'name' => 'Rongi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            122 =>
            array (
                'id' => 123,
                'district_id' => 10,
                'name' => 'Rugendabari',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            123 =>
            array (
                'id' => 124,
                'district_id' => 10,
                'name' => 'Shyogwe',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            124 =>
            array (
                'id' => 125,
                'district_id' => 11,
                'name' => 'Gacurabwenge',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            125 =>
            array (
                'id' => 126,
                'district_id' => 11,
                'name' => 'Karama',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            126 =>
            array (
                'id' => 127,
                'district_id' => 11,
                'name' => 'Kayenzi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            127 =>
            array (
                'id' => 128,
                'district_id' => 11,
                'name' => 'Kayumbu',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            128 =>
            array (
                'id' => 129,
                'district_id' => 11,
                'name' => 'Mugina',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            129 =>
            array (
                'id' => 130,
                'district_id' => 11,
                'name' => 'Musambira',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            130 =>
            array (
                'id' => 131,
                'district_id' => 11,
                'name' => 'Ngamba',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            131 =>
            array (
                'id' => 132,
                'district_id' => 11,
                'name' => 'Nyamiyaga',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            132 =>
            array (
                'id' => 133,
                'district_id' => 11,
                'name' => 'Nyarubaka',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            133 =>
            array (
                'id' => 134,
                'district_id' => 11,
                'name' => 'Rugarika',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            134 =>
            array (
                'id' => 135,
                'district_id' => 11,
                'name' => 'Rukoma',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            135 =>
            array (
                'id' => 136,
                'district_id' => 11,
                'name' => 'Runda',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            136 =>
            array (
                'id' => 137,
                'district_id' => 12,
                'name' => 'Bwishyura',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            137 =>
            array (
                'id' => 138,
                'district_id' => 12,
                'name' => 'Gashari',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            138 =>
            array (
                'id' => 139,
                'district_id' => 12,
                'name' => 'Gishyita',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            139 =>
            array (
                'id' => 140,
                'district_id' => 12,
                'name' => 'Gitesi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            140 =>
            array (
                'id' => 141,
                'district_id' => 12,
                'name' => 'Mubuga',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            141 =>
            array (
                'id' => 142,
                'district_id' => 12,
                'name' => 'Murambi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            142 =>
            array (
                'id' => 143,
                'district_id' => 12,
                'name' => 'Murundi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            143 =>
            array (
                'id' => 144,
                'district_id' => 12,
                'name' => 'Mutuntu',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            144 =>
            array (
                'id' => 145,
                'district_id' => 12,
                'name' => 'Rubengera',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            145 =>
            array (
                'id' => 146,
                'district_id' => 12,
                'name' => 'Rugabano',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            146 =>
            array (
                'id' => 147,
                'district_id' => 12,
                'name' => 'Ruganda',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            147 =>
            array (
                'id' => 148,
                'district_id' => 12,
                'name' => 'Rwankuba',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            148 =>
            array (
                'id' => 149,
                'district_id' => 12,
                'name' => 'Twumba',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            149 =>
            array (
                'id' => 150,
                'district_id' => 13,
                'name' => 'Boneza',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            150 =>
            array (
                'id' => 151,
                'district_id' => 13,
                'name' => 'Gihango',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            151 =>
            array (
                'id' => 152,
                'district_id' => 13,
                'name' => 'Kigeyo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            152 =>
            array (
                'id' => 153,
                'district_id' => 13,
                'name' => 'Kivumu',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            153 =>
            array (
                'id' => 154,
                'district_id' => 13,
                'name' => 'Manihira',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            154 =>
            array (
                'id' => 155,
                'district_id' => 13,
                'name' => 'Mukura',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            155 =>
            array (
                'id' => 156,
                'district_id' => 13,
                'name' => 'Murunda',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            156 =>
            array (
                'id' => 157,
                'district_id' => 13,
                'name' => 'Musasa',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            157 =>
            array (
                'id' => 158,
                'district_id' => 13,
                'name' => 'Mushonyi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            158 =>
            array (
                'id' => 159,
                'district_id' => 13,
                'name' => 'Mushubati',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            159 =>
            array (
                'id' => 160,
                'district_id' => 13,
                'name' => 'Nyabirasi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            160 =>
            array (
                'id' => 161,
                'district_id' => 13,
                'name' => 'Ruhango',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            161 =>
            array (
                'id' => 162,
                'district_id' => 13,
                'name' => 'Rusebeya',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            162 =>
            array (
                'id' => 163,
                'district_id' => 14,
                'name' => 'Bugeshi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            163 =>
            array (
                'id' => 164,
                'district_id' => 14,
                'name' => 'Busasamana',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            164 =>
            array (
                'id' => 165,
                'district_id' => 14,
                'name' => 'Cyanzarwe',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            165 =>
            array (
                'id' => 166,
                'district_id' => 14,
                'name' => 'Gisenyi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            166 =>
            array (
                'id' => 167,
                'district_id' => 14,
                'name' => 'Kanama',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            167 =>
            array (
                'id' => 168,
                'district_id' => 14,
                'name' => 'Kanzenze',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            168 =>
            array (
                'id' => 169,
                'district_id' => 14,
                'name' => 'Mudende',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            169 =>
            array (
                'id' => 170,
                'district_id' => 14,
                'name' => 'Nyakiriba',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            170 =>
            array (
                'id' => 171,
                'district_id' => 14,
                'name' => 'Nyamyumba',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            171 =>
            array (
                'id' => 172,
                'district_id' => 14,
                'name' => 'Nyundo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            172 =>
            array (
                'id' => 173,
                'district_id' => 14,
                'name' => 'Rubavu',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            173 =>
            array (
                'id' => 174,
                'district_id' => 14,
                'name' => 'Rugerero',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            174 =>
            array (
                'id' => 175,
                'district_id' => 15,
                'name' => 'Bigogwe',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            175 =>
            array (
                'id' => 176,
                'district_id' => 15,
                'name' => 'Jenda',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            176 =>
            array (
                'id' => 177,
                'district_id' => 15,
                'name' => 'Jomba',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            177 =>
            array (
                'id' => 178,
                'district_id' => 15,
                'name' => 'Kabatwa',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            178 =>
            array (
                'id' => 179,
                'district_id' => 15,
                'name' => 'Karago',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            179 =>
            array (
                'id' => 180,
                'district_id' => 15,
                'name' => 'Kintobo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            180 =>
            array (
                'id' => 181,
                'district_id' => 15,
                'name' => 'Mukamira',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            181 =>
            array (
                'id' => 182,
                'district_id' => 15,
                'name' => 'Muringa',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            182 =>
            array (
                'id' => 183,
                'district_id' => 15,
                'name' => 'Rambura',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            183 =>
            array (
                'id' => 184,
                'district_id' => 15,
                'name' => 'Rugera',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            184 =>
            array (
                'id' => 185,
                'district_id' => 15,
                'name' => 'Rurembo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            185 =>
            array (
                'id' => 186,
                'district_id' => 15,
                'name' => 'Shyira',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            186 =>
            array (
                'id' => 187,
                'district_id' => 16,
                'name' => 'BWIRA',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            187 =>
            array (
                'id' => 188,
                'district_id' => 16,
                'name' => 'GATUMBA',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            188 =>
            array (
                'id' => 189,
                'district_id' => 16,
                'name' => 'HINDIRO',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            189 =>
            array (
                'id' => 190,
                'district_id' => 16,
                'name' => 'KABAYA',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            190 =>
            array (
                'id' => 191,
                'district_id' => 16,
                'name' => 'KAGEYO',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            191 =>
            array (
                'id' => 192,
                'district_id' => 16,
                'name' => 'KAVUMU',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            192 =>
            array (
                'id' => 193,
                'district_id' => 16,
                'name' => 'MATYAZO',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            193 =>
            array (
                'id' => 194,
                'district_id' => 16,
                'name' => 'MUHANDA',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            194 =>
            array (
                'id' => 195,
                'district_id' => 16,
                'name' => 'MUHORORO',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            195 =>
            array (
                'id' => 196,
                'district_id' => 16,
                'name' => 'NDARO',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            196 =>
            array (
                'id' => 197,
                'district_id' => 16,
                'name' => 'NGORORERO',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            197 =>
            array (
                'id' => 198,
                'district_id' => 16,
                'name' => 'NYANGE',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            198 =>
            array (
                'id' => 199,
                'district_id' => 16,
                'name' => 'SOVU',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            199 =>
            array (
                'id' => 200,
                'district_id' => 17,
                'name' => 'Bugarama',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            200 =>
            array (
                'id' => 201,
                'district_id' => 17,
                'name' => 'Butare',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            201 =>
            array (
                'id' => 202,
                'district_id' => 17,
                'name' => 'Bweyeye',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            202 =>
            array (
                'id' => 203,
                'district_id' => 17,
                'name' => 'Gashonga',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            203 =>
            array (
                'id' => 204,
                'district_id' => 17,
                'name' => 'Giheke',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            204 =>
            array (
                'id' => 205,
                'district_id' => 17,
                'name' => 'Gihundwe',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            205 =>
            array (
                'id' => 206,
                'district_id' => 17,
                'name' => 'Gikundamvura',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            206 =>
            array (
                'id' => 207,
                'district_id' => 17,
                'name' => 'Gitambi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            207 =>
            array (
                'id' => 208,
                'district_id' => 17,
                'name' => 'Kamembe',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            208 =>
            array (
                'id' => 209,
                'district_id' => 17,
                'name' => 'Muganza',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            209 =>
            array (
                'id' => 210,
                'district_id' => 17,
                'name' => 'Mururu',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            210 =>
            array (
                'id' => 211,
                'district_id' => 17,
                'name' => 'Nkanka',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            211 =>
            array (
                'id' => 212,
                'district_id' => 17,
                'name' => 'Nkombo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            212 =>
            array (
                'id' => 213,
                'district_id' => 17,
                'name' => 'Nkungu',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            213 =>
            array (
                'id' => 214,
                'district_id' => 17,
                'name' => 'Nyakabuye',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            214 =>
            array (
                'id' => 215,
                'district_id' => 17,
                'name' => 'Nyakarenzo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            215 =>
            array (
                'id' => 216,
                'district_id' => 17,
                'name' => 'Nzahaha',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            216 =>
            array (
                'id' => 217,
                'district_id' => 17,
                'name' => 'Rwimbogo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            217 =>
            array (
                'id' => 218,
                'district_id' => 18,
                'name' => 'Bushekeri',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            218 =>
            array (
                'id' => 219,
                'district_id' => 18,
                'name' => 'Bushenge',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            219 =>
            array (
                'id' => 220,
                'district_id' => 18,
                'name' => 'Cyato',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            220 =>
            array (
                'id' => 221,
                'district_id' => 18,
                'name' => 'Gihombo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            221 =>
            array (
                'id' => 222,
                'district_id' => 18,
                'name' => 'Kagano',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            222 =>
            array (
                'id' => 223,
                'district_id' => 18,
                'name' => 'Kanjongo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            223 =>
            array (
                'id' => 224,
                'district_id' => 18,
                'name' => 'Karambi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            224 =>
            array (
                'id' => 225,
                'district_id' => 18,
                'name' => 'Karengera',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            225 =>
            array (
                'id' => 226,
                'district_id' => 18,
                'name' => 'Kirimbi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            226 =>
            array (
                'id' => 227,
                'district_id' => 18,
                'name' => 'Macuba',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            227 =>
            array (
                'id' => 228,
                'district_id' => 18,
                'name' => 'Mahembe',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            228 =>
            array (
                'id' => 229,
                'district_id' => 18,
                'name' => 'Nyabitekeri',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            229 =>
            array (
                'id' => 230,
                'district_id' => 18,
                'name' => 'Rangiro',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            230 =>
            array (
                'id' => 231,
                'district_id' => 18,
                'name' => 'Ruharambuga',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            231 =>
            array (
                'id' => 232,
                'district_id' => 18,
                'name' => 'Shangi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            232 =>
            array (
                'id' => 233,
                'district_id' => 19,
                'name' => 'BASE',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            233 =>
            array (
                'id' => 234,
                'district_id' => 19,
                'name' => 'BUREGA',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            234 =>
            array (
                'id' => 235,
                'district_id' => 19,
                'name' => 'BUSHOKI',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            235 =>
            array (
                'id' => 236,
                'district_id' => 19,
                'name' => 'BUYOGA',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            236 =>
            array (
                'id' => 237,
                'district_id' => 19,
                'name' => 'CYINZUZI',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            237 =>
            array (
                'id' => 238,
                'district_id' => 19,
                'name' => 'CYUNGO',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            238 =>
            array (
                'id' => 239,
                'district_id' => 19,
                'name' => 'KINIHIRA',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            239 =>
            array (
                'id' => 240,
                'district_id' => 19,
                'name' => 'KISARO',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            240 =>
            array (
                'id' => 241,
                'district_id' => 19,
                'name' => 'MASORO',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            241 =>
            array (
                'id' => 242,
                'district_id' => 19,
                'name' => 'MBOGO',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            242 =>
            array (
                'id' => 243,
                'district_id' => 19,
                'name' => 'MURAMBI',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            243 =>
            array (
                'id' => 244,
                'district_id' => 19,
                'name' => 'NGOMA',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            244 =>
            array (
                'id' => 245,
                'district_id' => 19,
                'name' => 'NTARABANA',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            245 =>
            array (
                'id' => 246,
                'district_id' => 19,
                'name' => 'RUKOZO',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            246 =>
            array (
                'id' => 247,
                'district_id' => 19,
                'name' => 'RUSIGA',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            247 =>
            array (
                'id' => 248,
                'district_id' => 19,
                'name' => 'SHYORONGI',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            248 =>
            array (
                'id' => 249,
                'district_id' => 19,
                'name' => 'TUMBA',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            249 =>
            array (
                'id' => 250,
                'district_id' => 20,
                'name' => 'Busengo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            250 =>
            array (
                'id' => 251,
                'district_id' => 20,
                'name' => 'Coko',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            251 =>
            array (
                'id' => 252,
                'district_id' => 20,
                'name' => 'Cyabingo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            252 =>
            array (
                'id' => 253,
                'district_id' => 20,
                'name' => 'Gakenke',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            253 =>
            array (
                'id' => 254,
                'district_id' => 20,
                'name' => 'Gashenyi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            254 =>
            array (
                'id' => 255,
                'district_id' => 20,
                'name' => 'Janja',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            255 =>
            array (
                'id' => 256,
                'district_id' => 20,
                'name' => 'Kamubuga',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            256 =>
            array (
                'id' => 257,
                'district_id' => 20,
                'name' => 'Karambo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            257 =>
            array (
                'id' => 258,
                'district_id' => 20,
                'name' => 'Kivuruga',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            258 =>
            array (
                'id' => 259,
                'district_id' => 20,
                'name' => 'Mataba',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            259 =>
            array (
                'id' => 260,
                'district_id' => 20,
                'name' => 'Minazi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            260 =>
            array (
                'id' => 261,
                'district_id' => 20,
                'name' => 'Mugunga',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            261 =>
            array (
                'id' => 262,
                'district_id' => 20,
                'name' => 'Muhondo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            262 =>
            array (
                'id' => 263,
                'district_id' => 20,
                'name' => 'Muyongwe',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            263 =>
            array (
                'id' => 264,
                'district_id' => 20,
                'name' => 'Muzo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            264 =>
            array (
                'id' => 265,
                'district_id' => 20,
                'name' => 'Nemba',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            265 =>
            array (
                'id' => 266,
                'district_id' => 20,
                'name' => 'Ruli',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            266 =>
            array (
                'id' => 267,
                'district_id' => 20,
                'name' => 'Rusasa',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            267 =>
            array (
                'id' => 268,
                'district_id' => 20,
                'name' => 'Rushashi',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            268 =>
            array (
                'id' => 269,
                'district_id' => 21,
                'name' => 'Busogo',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            269 =>
            array (
                'id' => 270,
                'district_id' => 21,
                'name' => 'Cyuve',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            270 =>
            array (
                'id' => 271,
                'district_id' => 21,
                'name' => 'Gacaca',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            271 =>
            array (
                'id' => 272,
                'district_id' => 21,
                'name' => 'Gashaki',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            272 =>
            array (
                'id' => 273,
                'district_id' => 21,
                'name' => 'Gataraga',
                'created_at' => '2021-06-23 15:28:57',
                'updated_at' => '2021-06-23 15:28:57',
            ),
            273 =>
            array (
                'id' => 274,
                'district_id' => 21,
                'name' => 'Kimonyi',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            274 =>
            array (
                'id' => 275,
                'district_id' => 21,
                'name' => 'Kinigi',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            275 =>
            array (
                'id' => 276,
                'district_id' => 21,
                'name' => 'Muhoza',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            276 =>
            array (
                'id' => 277,
                'district_id' => 21,
                'name' => 'Muko',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            277 =>
            array (
                'id' => 278,
                'district_id' => 21,
                'name' => 'Musanze',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            278 =>
            array (
                'id' => 279,
                'district_id' => 21,
                'name' => 'Nkotsi',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            279 =>
            array (
                'id' => 280,
                'district_id' => 21,
                'name' => 'Nyange',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            280 =>
            array (
                'id' => 281,
                'district_id' => 21,
                'name' => 'Remera',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            281 =>
            array (
                'id' => 282,
                'district_id' => 21,
                'name' => 'Rwaza',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            282 =>
            array (
                'id' => 283,
                'district_id' => 21,
                'name' => 'Shingiro',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            283 =>
            array (
                'id' => 284,
                'district_id' => 22,
                'name' => 'Bungwe',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            284 =>
            array (
                'id' => 285,
                'district_id' => 22,
                'name' => 'Butaro',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            285 =>
            array (
                'id' => 286,
                'district_id' => 22,
                'name' => 'Cyanika',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            286 =>
            array (
                'id' => 287,
                'district_id' => 22,
                'name' => 'Cyeru',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            287 =>
            array (
                'id' => 288,
                'district_id' => 22,
                'name' => 'Gahunga',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            288 =>
            array (
                'id' => 289,
                'district_id' => 22,
                'name' => 'Gatebe',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            289 =>
            array (
                'id' => 290,
                'district_id' => 22,
                'name' => 'Gitovu',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            290 =>
            array (
                'id' => 291,
                'district_id' => 22,
                'name' => 'Kagogo',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            291 =>
            array (
                'id' => 292,
                'district_id' => 22,
                'name' => 'Kinoni',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            292 =>
            array (
                'id' => 293,
                'district_id' => 22,
                'name' => 'Kinyababa',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            293 =>
            array (
                'id' => 294,
                'district_id' => 22,
                'name' => 'Kivuye',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            294 =>
            array (
                'id' => 295,
                'district_id' => 22,
                'name' => 'Nemba',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            295 =>
            array (
                'id' => 296,
                'district_id' => 22,
                'name' => 'Rugarama',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            296 =>
            array (
                'id' => 297,
                'district_id' => 22,
                'name' => 'Rugengabari',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            297 =>
            array (
                'id' => 298,
                'district_id' => 22,
                'name' => 'Ruhunde',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            298 =>
            array (
                'id' => 299,
                'district_id' => 22,
                'name' => 'Rusarabuye',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            299 =>
            array (
                'id' => 300,
                'district_id' => 22,
                'name' => 'Rwerere',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            300 =>
            array (
                'id' => 301,
                'district_id' => 23,
                'name' => 'Bukure',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            301 =>
            array (
                'id' => 302,
                'district_id' => 23,
                'name' => 'Bwisige',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            302 =>
            array (
                'id' => 303,
                'district_id' => 23,
                'name' => 'Byumba',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            303 =>
            array (
                'id' => 304,
                'district_id' => 23,
                'name' => 'Cyumba',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            304 =>
            array (
                'id' => 305,
                'district_id' => 23,
                'name' => 'Giti',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            305 =>
            array (
                'id' => 306,
                'district_id' => 23,
                'name' => 'Kageyo',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            306 =>
            array (
                'id' => 307,
                'district_id' => 23,
                'name' => 'Kaniga',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            307 =>
            array (
                'id' => 308,
                'district_id' => 23,
                'name' => 'Manyagiro',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            308 =>
            array (
                'id' => 309,
                'district_id' => 23,
                'name' => 'Miyove',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            309 =>
            array (
                'id' => 310,
                'district_id' => 23,
                'name' => 'Mukarange',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            310 =>
            array (
                'id' => 311,
                'district_id' => 23,
                'name' => 'Muko',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            311 =>
            array (
                'id' => 312,
                'district_id' => 23,
                'name' => 'Mutete',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            312 =>
            array (
                'id' => 313,
                'district_id' => 23,
                'name' => 'Nyamiyaga',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            313 =>
            array (
                'id' => 314,
                'district_id' => 23,
                'name' => 'Nyankenke',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            314 =>
            array (
                'id' => 315,
                'district_id' => 23,
                'name' => 'Rubaya',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            315 =>
            array (
                'id' => 316,
                'district_id' => 23,
                'name' => 'Rukomo',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            316 =>
            array (
                'id' => 317,
                'district_id' => 23,
                'name' => 'Rushaki',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            317 =>
            array (
                'id' => 318,
                'district_id' => 23,
                'name' => 'Rutare',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            318 =>
            array (
                'id' => 319,
                'district_id' => 23,
                'name' => 'Ruvune',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            319 =>
            array (
                'id' => 320,
                'district_id' => 23,
                'name' => 'Rwamiko',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            320 =>
            array (
                'id' => 321,
                'district_id' => 23,
                'name' => 'Shangasha',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            321 =>
            array (
                'id' => 322,
                'district_id' => 24,
                'name' => 'Fumbwe',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            322 =>
            array (
                'id' => 323,
                'district_id' => 24,
                'name' => 'Gahengeri',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            323 =>
            array (
                'id' => 324,
                'district_id' => 24,
                'name' => 'Gishali',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            324 =>
            array (
                'id' => 325,
                'district_id' => 24,
                'name' => 'Karenge',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            325 =>
            array (
                'id' => 326,
                'district_id' => 24,
                'name' => 'Kigabiro',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            326 =>
            array (
                'id' => 327,
                'district_id' => 24,
                'name' => 'Muhazi',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            327 =>
            array (
                'id' => 328,
                'district_id' => 24,
                'name' => 'Munyaga',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            328 =>
            array (
                'id' => 329,
                'district_id' => 24,
                'name' => 'Munyiginya',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            329 =>
            array (
                'id' => 330,
                'district_id' => 24,
                'name' => 'Musha',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            330 =>
            array (
                'id' => 331,
                'district_id' => 24,
                'name' => 'Muyumbu',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            331 =>
            array (
                'id' => 332,
                'district_id' => 24,
                'name' => 'Mwulire',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            332 =>
            array (
                'id' => 333,
                'district_id' => 24,
                'name' => 'Nyakaliro',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            333 =>
            array (
                'id' => 334,
                'district_id' => 24,
                'name' => 'Nzige',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            334 =>
            array (
                'id' => 335,
                'district_id' => 24,
                'name' => 'Rubona',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            335 =>
            array (
                'id' => 336,
                'district_id' => 25,
                'name' => 'GATUNDA',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            336 =>
            array (
                'id' => 337,
                'district_id' => 25,
                'name' => 'KARAMA',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            337 =>
            array (
                'id' => 338,
                'district_id' => 25,
                'name' => 'KARANGAZI',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            338 =>
            array (
                'id' => 339,
                'district_id' => 25,
                'name' => 'KATABAGEMU',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            339 =>
            array (
                'id' => 340,
                'district_id' => 25,
                'name' => 'KIYOMBE',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            340 =>
            array (
                'id' => 341,
                'district_id' => 25,
                'name' => 'MATIMBA',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            341 =>
            array (
                'id' => 342,
                'district_id' => 25,
                'name' => 'MIMURI',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            342 =>
            array (
                'id' => 343,
                'district_id' => 25,
                'name' => 'MUKAMA',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            343 =>
            array (
                'id' => 344,
                'district_id' => 25,
                'name' => 'MUSHERI',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            344 =>
            array (
                'id' => 345,
                'district_id' => 25,
                'name' => 'NYAGATARE',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            345 =>
            array (
                'id' => 346,
                'district_id' => 25,
                'name' => 'RUKOMO',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            346 =>
            array (
                'id' => 347,
                'district_id' => 25,
                'name' => 'RWEMPASHA',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            347 =>
            array (
                'id' => 348,
                'district_id' => 25,
                'name' => 'RWIMIYAGA',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            348 =>
            array (
                'id' => 349,
                'district_id' => 25,
                'name' => 'TABAGWE',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            349 =>
            array (
                'id' => 350,
                'district_id' => 26,
                'name' => 'Gasange',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            350 =>
            array (
                'id' => 351,
                'district_id' => 26,
                'name' => 'Gatsibo',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            351 =>
            array (
                'id' => 352,
                'district_id' => 26,
                'name' => 'Gitoki',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            352 =>
            array (
                'id' => 353,
                'district_id' => 26,
                'name' => 'Kabarore',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            353 =>
            array (
                'id' => 354,
                'district_id' => 26,
                'name' => 'Kageyo',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            354 =>
            array (
                'id' => 355,
                'district_id' => 26,
                'name' => 'Kiramuruzi',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            355 =>
            array (
                'id' => 356,
                'district_id' => 26,
                'name' => 'Kiziguro',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            356 =>
            array (
                'id' => 357,
                'district_id' => 26,
                'name' => 'Muhura',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            357 =>
            array (
                'id' => 358,
                'district_id' => 26,
                'name' => 'Murambi',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            358 =>
            array (
                'id' => 359,
                'district_id' => 26,
                'name' => 'Ngarama',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            359 =>
            array (
                'id' => 360,
                'district_id' => 26,
                'name' => 'Nyagihanga',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            360 =>
            array (
                'id' => 361,
                'district_id' => 26,
                'name' => 'Remera',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            361 =>
            array (
                'id' => 362,
                'district_id' => 26,
                'name' => 'Rugarama',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            362 =>
            array (
                'id' => 363,
                'district_id' => 26,
                'name' => 'Rwimbogo',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            363 =>
            array (
                'id' => 364,
                'district_id' => 27,
                'name' => 'Gahini',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            364 =>
            array (
                'id' => 365,
                'district_id' => 27,
                'name' => 'Kabare',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            365 =>
            array (
                'id' => 366,
                'district_id' => 27,
                'name' => 'Kabarondo',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            366 =>
            array (
                'id' => 367,
                'district_id' => 27,
                'name' => 'Mukarange',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            367 =>
            array (
                'id' => 368,
                'district_id' => 27,
                'name' => 'Murama',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            368 =>
            array (
                'id' => 369,
                'district_id' => 27,
                'name' => 'Murundi',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            369 =>
            array (
                'id' => 370,
                'district_id' => 27,
                'name' => 'Mwiri',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            370 =>
            array (
                'id' => 371,
                'district_id' => 27,
                'name' => 'Ndego',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            371 =>
            array (
                'id' => 372,
                'district_id' => 27,
                'name' => 'Nyamirama',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            372 =>
            array (
                'id' => 373,
                'district_id' => 27,
                'name' => 'Rukara',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            373 =>
            array (
                'id' => 374,
                'district_id' => 27,
                'name' => 'Ruramira',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            374 =>
            array (
                'id' => 375,
                'district_id' => 27,
                'name' => 'Rwinkwavu',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            375 =>
            array (
                'id' => 376,
                'district_id' => 28,
                'name' => 'Gahara',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            376 =>
            array (
                'id' => 377,
                'district_id' => 28,
                'name' => 'Gatore',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            377 =>
            array (
                'id' => 378,
                'district_id' => 28,
                'name' => 'Kigarama',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            378 =>
            array (
                'id' => 379,
                'district_id' => 28,
                'name' => 'Kigina',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            379 =>
            array (
                'id' => 380,
                'district_id' => 28,
                'name' => 'Kirehe',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            380 =>
            array (
                'id' => 381,
                'district_id' => 28,
                'name' => 'Mahama',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            381 =>
            array (
                'id' => 382,
                'district_id' => 28,
                'name' => 'Mpanga',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            382 =>
            array (
                'id' => 383,
                'district_id' => 28,
                'name' => 'Musaza',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            383 =>
            array (
                'id' => 384,
                'district_id' => 28,
                'name' => 'Mushikiri',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            384 =>
            array (
                'id' => 385,
                'district_id' => 28,
                'name' => 'Nasho',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            385 =>
            array (
                'id' => 386,
                'district_id' => 28,
                'name' => 'Nyamugari',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            386 =>
            array (
                'id' => 387,
                'district_id' => 28,
                'name' => 'Nyarubuye',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            387 =>
            array (
                'id' => 388,
                'district_id' => 29,
                'name' => 'Gashanda',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            388 =>
            array (
                'id' => 389,
                'district_id' => 29,
                'name' => 'Jarama',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            389 =>
            array (
                'id' => 390,
                'district_id' => 29,
                'name' => 'Karembo',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            390 =>
            array (
                'id' => 391,
                'district_id' => 29,
                'name' => 'Kazo',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            391 =>
            array (
                'id' => 392,
                'district_id' => 29,
                'name' => 'Kibungo',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            392 =>
            array (
                'id' => 393,
                'district_id' => 29,
                'name' => 'Mugesera',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            393 =>
            array (
                'id' => 394,
                'district_id' => 29,
                'name' => 'Murama',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            394 =>
            array (
                'id' => 395,
                'district_id' => 29,
                'name' => 'Mutenderi',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            395 =>
            array (
                'id' => 396,
                'district_id' => 29,
                'name' => 'Remera',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            396 =>
            array (
                'id' => 397,
                'district_id' => 29,
                'name' => 'Rukira',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            397 =>
            array (
                'id' => 398,
                'district_id' => 29,
                'name' => 'Rukumberi',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            398 =>
            array (
                'id' => 399,
                'district_id' => 29,
                'name' => 'Rurenge',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            399 =>
            array (
                'id' => 400,
                'district_id' => 29,
                'name' => 'Sake',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            400 =>
            array (
                'id' => 401,
                'district_id' => 29,
                'name' => 'Zaza',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            401 =>
            array (
                'id' => 402,
                'district_id' => 30,
                'name' => 'Gashora',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            402 =>
            array (
                'id' => 403,
                'district_id' => 30,
                'name' => 'Juru',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            403 =>
            array (
                'id' => 404,
                'district_id' => 30,
                'name' => 'Kamabuye',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            404 =>
            array (
                'id' => 405,
                'district_id' => 30,
                'name' => 'Mareba',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            405 =>
            array (
                'id' => 406,
                'district_id' => 30,
                'name' => 'Mayange',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            406 =>
            array (
                'id' => 407,
                'district_id' => 30,
                'name' => 'Musenyi',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            407 =>
            array (
                'id' => 408,
                'district_id' => 30,
                'name' => 'Mwogo',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            408 =>
            array (
                'id' => 409,
                'district_id' => 30,
                'name' => 'Ngeruka',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            409 =>
            array (
                'id' => 410,
                'district_id' => 30,
                'name' => 'Ntarama',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            410 =>
            array (
                'id' => 411,
                'district_id' => 30,
                'name' => 'Nyamata',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            411 =>
            array (
                'id' => 412,
                'district_id' => 30,
                'name' => 'Nyarugenge',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            412 =>
            array (
                'id' => 413,
                'district_id' => 30,
                'name' => 'Rilima',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            413 =>
            array (
                'id' => 414,
                'district_id' => 30,
                'name' => 'Ruhuha',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            414 =>
            array (
                'id' => 415,
                'district_id' => 30,
                'name' => 'Rweru',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
            415 =>
            array (
                'id' => 416,
                'district_id' => 30,
                'name' => 'Shyara',
                'created_at' => '2021-06-23 15:28:58',
                'updated_at' => '2021-06-23 15:28:58',
            ),
        ));


    }
}
