<?php

use Illuminate\Database\Seeder;
use App\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::truncate();
        $faker = Faker\Factory::create();

        for($i=0; $i<=150; $i++):
            Movie::create([
                'user_id' => rand(1, 10),
                'name' => $faker->sentence(),
                'description' => $faker->text(),
                'year' => $faker->year(),
            ]);
        endfor;
    }
}
