<?php

use App\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * @NOTE
 * EloquentORM => Implementación y adaptación del patrón ActiveRecord
 */

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Sentencias SQL
         */
        //DB::insert('INSERT INTO professions (title) VALUES (:title)', [
        //    'title' => 'Desarrollador back-end'
        //]) ;

        /**
         * Constructor de consultas SQL de Laravel
         */
        //DB::table('professions')->insert([
        //    'title' => 'Desarrollador back-end',
        //]);
        //
        //DB::table('professions')->insert([
        //    'title' => 'Desarrollador front-end',
        //]);
        //
        //DB::table('professions')->insert([
        //    'title' => 'Diseñador web',
        //]);

        /**
         * Eloquent ORM
         */
        Profession::create([
            'title' => 'Desarrollador back-end',
        ]);

        Profession::create([
            'title' => 'Desarrollador front-end',
        ]);

        Profession::create([
            'title' => 'Diseñador web',
        ]);

        factory(Profession::class)->times(17)->create();
    }
}
