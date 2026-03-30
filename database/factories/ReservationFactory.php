<?php

namespace Database\Factories;

use App\Models\House;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = fake('fr_FR');
        $start = $faker->dateTimeBetween('-1 month', '+4 months');
        $end = (clone $start)->modify('+'.fake()->numberBetween(2, 14).' days');

        return [
            'user_id' => User::factory()->roleUser(),
            'house_id' => House::factory(),
            'start_date' => $start->format('Y-m-d'),
            'end_date' => $end->format('Y-m-d'),
            'status' => $faker->randomElement(['pending', 'confirmed', 'cancelled']),
            'notes' => $faker->optional(0.6)->sentence(),
            'has_breakfast' => $faker->boolean(35),
            'has_love_room' => $faker->boolean(20),
            'additional_options' => $faker->optional(0.4)->randomElement([
                ['Navette aéroport' => 45],
                ['Linge de lit premium' => 25],
            ]),
            'stripe_session_id' => null,
            'payment_status' => $faker->randomElement(['pending', 'paid', 'failed', 'refunded']),
        ];
    }
}
