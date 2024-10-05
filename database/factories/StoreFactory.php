<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'              =>fake()->name(),
            'slug'              =>Str::slug(fake()->name()),
            'description'       =>fake()->paragraph(),
            'logo'              =>fake()->imageUrl(),
            'banner'            =>null,
            'phone'             =>fake()->phoneNumber(),
            'address'           =>fake()->address(),
            'city'              =>fake()->city(),
            'country'           =>fake()->countryCode(),
            'user_id'           =>1
        ];
    }
}
