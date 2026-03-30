<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'house_id',
        'start_date',
        'end_date',
        'status',
        'notes',
        'has_breakfast',
        'has_love_room',
        'additional_options',
        'stripe_session_id',
        'payment_status'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'additional_options' => 'array',
    ];

    protected $attributes = [
        'status' => 'pending',
        'payment_status' => 'pending',
    ];

    /**
     * Vérifie si la réservation est en attente de paiement
     */
    public function isPendingPayment(): bool
    {
        return $this->status === 'pending' && $this->payment_status === 'pending';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }

    public function isAvailableForDates($startDate, $endDate): bool
    {
        return !self::where('house_id', $this->house_id)
            ->where('status', '!=', 'cancelled')
            ->where(function($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                      ->orWhereBetween('end_date', [$startDate, $endDate])
                      ->orWhere(function($q) use ($startDate, $endDate) {
                          $q->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                      });
            })
            ->exists();
    }
}
