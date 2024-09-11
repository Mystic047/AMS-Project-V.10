<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        // Use Thai locale for Faker
        $faker = \Faker\Factory::create('th_TH');

        return [
            // Generate an email with a number before the @ sign
            'email' => $this->faker->unique()->randomNumber(8) . '@example.com',
            'password' => bcrypt('password'), // or use Hash::make('password')
            'nickName' => $faker->firstName, // Generate a Thai nickname
            'firstName' => $faker->firstName, // Generate a Thai first name
            'lastName' => $faker->lastName, // Generate a Thai last name
            'areaId' => rand(1, 10), // Random areaId, adjust based on your data
            'profilePicture' => null, // Set profile picture to null
        ];
    }
}

