<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'users')->insert([
            'name' => 'Johan Quiroga',
            'email' => 'johanquiroga@gmail.com',
            'password' => bcrypt('laravel'),
        ]);
    }
}
