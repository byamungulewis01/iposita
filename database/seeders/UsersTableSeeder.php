<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->delete();

        DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Iposita Admin',
                'email' => 'admin@iposita.com',
                'telephone' => '0786875878',
                'is_active' => true,
                'is_super_admin' => true,
                'email_verified_at' => '2021-10-11 12:11:37',
                'password' => bcrypt("password"),
                'remember_token' => NULL,
                'created_at' => '2021-10-11 12:11:59',
                'updated_at' => '2021-10-11 12:12:01',
            ),
        ));


    }
}
