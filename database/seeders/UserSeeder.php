<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Professor;
use App\Models\Admin;
use App\Models\Coordinator;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 professor records
        Professor::factory()->count(10)->create();

        // Create 5 admin records
        Admin::factory()->count(5)->create();

        // Create 10 coordinator records
        Coordinator::factory()->count(10)->create();
    }
}

