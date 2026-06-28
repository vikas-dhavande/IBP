<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Event;
use App\Models\Membership;
use App\Models\Rsvp;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $memberships = Membership::factory()->createMany([
            ['tier' => 'Free', 'price_monthly' => 0, 'price_yearly' => 0, 'features' => ['Browse events', 'Join community']],
            ['tier' => 'Premium', 'price_monthly' => 49, 'price_yearly' => 470, 'features' => ['VIP Events', 'Early Booking', 'Discounts']],
            ['tier' => 'VIP', 'price_monthly' => 199, 'price_yearly' => 1900, 'features' => ['Private Groups', 'Custom Trips', 'Dedicated Concierge']],
        ]);

        $cities = City::factory(30)->create();

        $users = User::factory(100)->create([
            'membership_id' => $memberships->random()->id,
            'city_id' => $cities->random()->id,
        ]);

        $events = Event::factory(50)->create(function () use ($cities, $memberships) {
            return [
                'city_id' => $cities->random()->id,
                'membership_id' => fake()->boolean(30) ? $memberships->random()->id : null,
            ];
        });

        foreach ($users as $user) {
            $userEvents = $events->random(random_int(0, 5));
            foreach ($userEvents as $event) {
                Rsvp::factory()->create([
                    'user_id' => $user->id,
                    'event_id' => $event->id,
                ]);
            }
        }
    }
}
