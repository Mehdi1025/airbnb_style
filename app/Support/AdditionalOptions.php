<?php

namespace App\Support;

/**
 * Agrège le prix des options additionnelles quelle que soit la forme stockée :
 * - liste d'objets [{ "name": "...", "price": 12 }, ...]
 * - tableau associatif ["Libellé" => 12, ...] (seed / anciennes données)
 */
final class AdditionalOptions
{
    public static function sumPrices(?array $options): float
    {
        if ($options === null || $options === []) {
            return 0.0;
        }

        $sum = 0.0;

        foreach ($options as $key => $option) {
            if (is_array($option) && isset($option['price'])) {
                $sum += (float) $option['price'];

                continue;
            }

            if (is_numeric($option)) {
                $sum += (float) $option;
            }
        }

        return $sum;
    }
}
