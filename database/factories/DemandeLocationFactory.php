<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DemandeLocation>
 */
class DemandeLocationFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = fake('fr_FR');

        return [
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'birth_date' => $faker->dateTimeBetween('-65 years', '-22 years')->format('Y-m-d'),
            'biens_list' => $faker->paragraphs(2, true),
            'email' => $faker->unique()->safeEmail(),
            'password' => 'password',
        ];
    }
}
