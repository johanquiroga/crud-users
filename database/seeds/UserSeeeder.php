<?php

use App\Profession;
use App\User;
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
        //$professions = DB::select('SELECT id FROM professions WHERE title = ?', ['Desarrollador back-end']);

        //$professionId = DB::table('professions')->whereTitle('Desarrollador back-end')->value('id');

        $professionId = Profession::where('title', 'Desarrollador back-end')->value('id');

        //DB::table( 'users')->insert([
        //    'name' => 'Johan Quiroga',
        //    'email' => 'johanquiroga@gmail.com',
        //    'password' => bcrypt('laravel'),
        //    'profession_id' => $professionId,
        //]);

        factory(User::class)->create([
            'name' => 'Johan Quiroga',
            'email' => 'johanquiroga@gmail.com',
            'password' => bcrypt('laravel'),
            'profession_id' => $professionId,
            'is_admin' => true,
        ]);

        factory(User::class)->create([
            'profession_id' => $professionId,
        ]);

        factory(User::class, 48)->create();
    }
}
