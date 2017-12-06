<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	for ($i = 1; $i <= 10; $i++) {
    		DB::table('users')->insert([
    			'fullname'     => 'user' . $i,
    			'email'    => 'user' . $i . '@gmail.com',
    			'username' => 'user' . $i,
    			'password' => bcrypt('secret'),
    			'aim'      => '1',
    			'birth'    => $faker->date($format = 'Y-m-d', $max = 'now'),
    			'address'  => $faker->address,
    			'job'      => $faker->jobTitle,
    			'weight'   => rand(30,150),
    		]);
    	}

    	for ($i = 11; $i <= 20; $i++) {
    		DB::table('users')->insert([
    			'fullname'     => 'user' . $i,
    			'email'    => 'user' . $i . '@gmail.com',
    			'username' => 'user' . $i,
    			'password' => bcrypt('secret'),
    			'aim'      => '2',
    			'birth'    => $faker->date($format = 'Y-m-d', $max = 'now'),
    			'address'  => $faker->address,
    			'job'      => $faker->jobTitle,
    			'weight'   => rand(30,150),
    		]);
    	}

    	for ($i = 21; $i <=30; $i++) {
    		DB::table('users')->insert([
    			'fullname'     => 'user' . $i,
    			'email'    => 'user' . $i . '@gmail.com',
    			'username' => 'user' . $i,
    			'password' => bcrypt('secret'),
    			'aim'      => '3',
    			'birth'    => $faker->date($format = 'Y-m-d', $max = 'now'),
    			'address'  => $faker->address,
    			'job'      => $faker->jobTitle,
    			'weight'   => rand(30,150),
    		]);
    	}
    }
}
