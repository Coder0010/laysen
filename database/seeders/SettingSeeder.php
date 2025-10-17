<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'key' => 'facebook',
                'value' => 'fb.com/laysen',
            ],
            [
                'key' => 'youtube',
                'value' => 'youtube.com/laysen',
            ],
            [
                'key' => 'linkedin',
                'value' => 'linkedin.com/laysen',
            ],
        ];

        Setting::upsert(
            $data,
            ['key'],
            ['value'] // columns to update
        );
    }
}
