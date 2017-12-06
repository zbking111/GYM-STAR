<?php

use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	for ($i = 1; $i <= 20; $i++) {
    		DB::table('programs')->insert([
    			'title'   => 'program' . $i ,
    			'image'   => 'https://placehold.it/150x80?text=IMAGE',
    			'level'   => rand(1,3),
    		]);
    	}
    }
}
