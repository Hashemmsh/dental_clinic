<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Seeder;
use Database\Seeders\RolesDataSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // Doctor::truncate();
        // Patient::truncate();

        // User::factory(10)->create();
        // Doctor::factory(15)->create();
        // Patient::factory(50)->create();
        // // \App\Models\User::factory(10)->create();

        // // \App\Models\User::factory()->create([
        // //     'name' => 'Test User',
        // //     'email' => 'test@example.com',
        // ]);
        $this->call(RolesDataSeeder::class);
    }
}
