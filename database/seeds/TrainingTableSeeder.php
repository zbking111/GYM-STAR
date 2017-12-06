<?php

use Illuminate\Database\Seeder;

class TrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=10; $i <= 30 ; $i++) {
            $faker = Faker\Factory::create();

            for ($j = 1; $j <= rand(8,15); $j++) {
              DB::table('training')->insert([
                'id_user'   => $i,
               'id_program'   => $faker->unique()->numberBetween(1,50),
           ]);
          }

          unset($faker);
      }


  }
}
