<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition()
    {
        $faker = \Faker\Factory::create('th_TH');

        return [
            'email' => $this->faker->unique()->randomNumber(8) . '@example.com',
            'password' => bcrypt('password'),
            'nickName' => $faker->firstName,
            'firstName' => $faker->firstName,
            'lastName' => $faker->lastName,
            'areaId' => rand(1, 10),
            'profilePicture' => null,
            'role' => 'admin',
        ];
    }
}

