<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $faker = Faker\Factory::create();

        for($i=0; $i<=10; $i++):
            User::create([
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'email' => $faker->freeEmail(),
                'password' => Hash::make('DSBmobile+'),
                'date_birth' => $faker->date(),
                'api_token' => Str::random(60)
            ]);
        endfor;
    }
}
