<?php

namespace Database\Factories;

use App\Http\Enums\BusinessTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(BusinessTypeEnum::cases()),
            'name_en' => fake()->name(),
            'name_ar' => fake()->name(),
            'address_en' => fake()->address(),
            'address_ar' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'description_en' => fake()->paragraph(),
            'description_ar' => fake()->paragraph(),
            'file' => fake()->imageUrl(),
            'location' => fake()->city(),
        ];
    }

}
