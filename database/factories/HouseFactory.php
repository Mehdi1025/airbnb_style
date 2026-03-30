<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\House>
 */
class HouseFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = fake('fr_FR');
        $types = ['studio', 'F1', 'F2', 'F3', 'F4', 'F5'];

        return [
            'description' => $faker->paragraphs(3, true),
            'lieu_exact' => $faker->city().', '.$faker->departmentName(),
            'surface' => $faker->randomFloat(2, 25, 280),
            'type' => $faker->randomElement($types),
            'prix' => $faker->randomFloat(2, 45, 850),
            'rate' => $faker->randomFloat(1, 3.5, 5.0),
            'photos' => [
                'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=800&q=80',
                'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=800&q=80',
            ],
            'user_id' => User::factory()->locataire(),
            'price_breakfast' => $faker->numberBetween(8, 25),
            'price_love_room' => $faker->numberBetween(30, 120),
            'additional_options' => [
                'Parking' => $faker->numberBetween(8, 20),
                'Ménage fin de séjour' => $faker->numberBetween(40, 90),
            ],
        ];
    }

    /**
     * Maison liée à un locataire existant (évite de créer un nouvel utilisateur).
     */
    public function forLocataire(User $user): static
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => $user->id,
        ]);
    }
}
