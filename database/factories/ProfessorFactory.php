<?php

namespace Database\Factories;

use App\Models\Professor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessorFactory extends Factory
{
    protected $model = Professor::class;

    public function definition()
    {
        // Use Thai locale for Faker
        $faker = \Faker\Factory::create('th_TH');

        return [
            'email' => $this->faker->unique()->randomNumber(8) . '@example.com',
            'password' => bcrypt('password'),
            'nickName' => $faker->firstName,
            'firstName' => $faker->firstName,
            'lastName' => $faker->lastName,
            'areaId' => rand(1, 10),
            'profilePicture' => null,
        ];
    }
}
