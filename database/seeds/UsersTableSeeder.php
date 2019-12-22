<?php

use App\User;
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
        for ($i = 0; $i < 40; $i++) {
            $faker = \Faker\Factory::create('es_AR');

            User::insert([
                'username'       => $faker->userName,
                'nombre'         => $faker->firstName,
                'apellido'       => $faker->lastName,
                'email'          => $faker->email,
                'nationality_id' => $faker->numberBetween(1, 6)
            ]);
        }

    }

}
