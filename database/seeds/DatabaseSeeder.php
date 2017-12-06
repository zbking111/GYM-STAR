<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();
    	$this->call(UsersTableSeeder::class);
    	$this->call(ProgramsTableSeeder::class);
    	$this->call(ActionsTableSeeder::class);
        $this->call(TrainingTableSeeder::class);
    	$this->call(IncludeTableSeeder::class);
    	Model::reguard();
    }
}
