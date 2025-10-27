<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'     => 'admin',
            'email'    => 'admin@example.com',
            'password' => 'Pa$$w0rd!',
        ]);

        // Lead::factory(5)->create();
        // Business::factory(5)->create()->each(function ($model, $index) {
        //     $model->name_en = 'Business-' . ($index + 1);
        //     $model->save();
        // });
        $this->call([
            SectionSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
