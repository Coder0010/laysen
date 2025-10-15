<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'Pa$$w0rd!'
        ]);

         Lead::factory(50)->create();
         Business::factory(50)->create();
         $this->call([
             SectionSeeder::class,
         ]);
    }
}
