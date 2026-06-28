<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'starts_at' => fake()->dateTimeBetween('+1 week', '+3 months'),
            'city_id' => \App\Models\City::factory(),
            'location_details' => fake()->address(),
            'capacity' => fake()->numberBetween(50, 500),
            'membership_id' => null,
        ];
    }
}
