<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $city = ["Jakarta", "Solo", "Bandung", "Tangerrang", "Bekasi", "Papua", "Bali", "Surabaya", "Yogyakarta", "Palembang"];
        return [
            'name' => fake()->name,
            'email' => fake()->safeEmail,
            'address' => fake()->address,
            'city' => $city[array_rand($city)],
            'created_at' => fake()->date('Y-m-d H:i:s'),
            'updated_at' => fake()->date('Y-m-d H:i:s')

        ];
    }
}
