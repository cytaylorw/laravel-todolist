<?php

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Todo::truncate();

        $faker = \Faker\Factory::create();

        for ($i=0; $i < 10; $i++) { 
            Todo::create([
                'title' => $faker->sentence,
                'completed' => $faker->boolean,
                'user_id' => $faker->numberBetween(1, 10)
            ]);
        }
    }
}
