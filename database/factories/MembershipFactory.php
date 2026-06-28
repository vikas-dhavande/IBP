<?php

namespace Database\Factories;

use App\Models\Membership;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Membership>
 */
class MembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tier' => fake()->unique()->word(),
            'price_monthly' => fake()->randomFloat(2, 10, 100),
            'price_yearly' => fake()->randomFloat(2, 100, 1000),
            'features' => [fake()->sentence(), fake()->sentence()],
        ];
    }
}
