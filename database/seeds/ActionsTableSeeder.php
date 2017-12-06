<?php

use Illuminate\Database\Seeder;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $faker = Faker\Factory::create();

    	for ($i = 1; $i <= 100; $i++) {
    		DB::table('actions')->insert([
    			'content' =>  'action-content' . $i,
    		]);
    	}
    }
}
