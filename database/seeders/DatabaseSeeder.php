<?php

namespace Database\Seeders;

use App\Models\DemandeLocation;
use App\Models\House;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Ordre : admin → utilisateurs → biens (locataires) → demandes → réservations.
     */
    public function run(): void
    {
        config(['app.faker_locale' => 'fr_FR']);

        // 1. Compte administrateur
        User::query()->updateOrCreate(
            ['email' => 'mehdibachiri2002@gmail.com'],
            [
                'first_name' => 'Bachiri',
                'last_name' => 'Mahdi',
                'password' => 'password',
                'role' => 'admin',
            ]
        );

        // Compte locataire (loueur) pour tests — connexion /locataire/login
        $loueurTest = User::query()->updateOrCreate(
            ['email' => 'loueur@test.com'],
            [
                'first_name' => 'Jean',
                'last_name' => 'Dupont',
                'password' => 'password',
                'role' => 'locataire',
            ]
        );

        House::factory()->forLocataire($loueurTest)->create();

        // 2. 10 utilisateurs classiques (voyageurs)
        User::factory()
            ->count(10)
            ->roleUser()
            ->create();

        // 3. Biens (chaque bien crée un locataire via la factory)
        House::factory()->count(35)->create();

        // 4. Demandes de location (sans FK)
        DemandeLocation::factory()->count(35)->create();

        // 5. Réservations (respect des clés étrangères + contrainte unique)
        $this->seedReservations(40);
    }

    /**
     * Génère des réservations en évitant les doublons (house_id, start_date, end_date, status).
     */
    private function seedReservations(int $count): void
    {
        $userIds = User::query()->where('role', 'user')->pluck('id');
        $houseIds = House::query()->pluck('id');

        if ($userIds->isEmpty() || $houseIds->isEmpty()) {
            return;
        }

        $created = 0;
        $attempts = 0;
        $maxAttempts = $count * 80;

        while ($created < $count && $attempts < $maxAttempts) {
            $attempts++;

            $faker = fake('fr_FR');
            $start = $faker->dateTimeBetween('-2 weeks', '+6 months');
            $end = (clone $start)->modify('+'.fake()->numberBetween(2, 14).' days');

            $startStr = $start->format('Y-m-d');
            $endStr = $end->format('Y-m-d');
            $status = $faker->randomElement(['pending', 'confirmed', 'cancelled']);
            $houseId = $houseIds->random();

            $duplicate = Reservation::query()
                ->where('house_id', $houseId)
                ->where('start_date', $startStr)
                ->where('end_date', $endStr)
                ->where('status', $status)
                ->exists();

            if ($duplicate) {
                continue;
            }

            $paymentStatus = match ($status) {
                'cancelled' => $faker->randomElement(['pending', 'failed', 'refunded']),
                'confirmed' => $faker->randomElement(['paid', 'pending']),
                default => 'pending',
            };

            Reservation::factory()->create([
                'user_id' => $userIds->random(),
                'house_id' => $houseId,
                'start_date' => $startStr,
                'end_date' => $endStr,
                'status' => $status,
                'payment_status' => $paymentStatus,
            ]);

            $created++;
        }
    }
}
