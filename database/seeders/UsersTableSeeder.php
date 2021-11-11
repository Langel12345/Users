<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ALEX',
            'email' => 'alex@gmail.com',
            'password' => bcrypt('alekandro19'),
            'type_user'=>1,
            'number' =>'4492049025',
            'cedula'=>'4585sjsjsjs',
            'code_city'=>'52',
            'birth_date'=>'1992-01-08',
        ]);
    }
}
