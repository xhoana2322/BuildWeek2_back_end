<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('admin'),
        //     'is_admin' => true
        // ]);
        // User::factory()->create([
        //     'name' => 'some',
        //     'email' => 'some@example.com',
        //     'password' => Hash::make('admin'),
        // ]);

        $this->call([
            CategorySeeder::class,
            AuthorSeeder::class,
            BookSeeder::class, 
            ReservationSeeder::class
        ]);
    }
}
