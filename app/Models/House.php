<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'lieu_exact',
        'surface',
        'type',
        'prix',
        'rate',
        'photos',
        'user_id',
        'price_breakfast',
        'price_love_room',
        'additional_options',
    ];

    protected $casts = [
        'surface' => 'decimal:2',
        'prix' => 'decimal:2',
        'rate' => 'decimal:1',
        'photos' => 'array',
        'additional_options' => 'array',
    ];

    /**
     * Relation avec l'utilisateur (locataire) qui a ajouté la maison
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the reservations for the house.
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Check if the house is available for the given dates
     */
    public function isAvailableForDates($startDate, $endDate): bool
    {
        return !$this->reservations()
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

    /**
     * Scope pour filtrer par type de logement
     */
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope pour filtrer par fourchette de prix
     */
    public function scopeByPriceRange($query, $minPrice, $maxPrice)
    {
        return $query->whereBetween('prix', [$minPrice, $maxPrice]);
    }

    /**
     * Scope pour filtrer par surface minimum
     */
    public function scopeByMinSurface($query, $minSurface)
    {
        return $query->where('surface', '>=', $minSurface);
    }

    /**
     * Accesseur pour formater le prix
     */
    public function getFormattedPrixAttribute()
    {
        return number_format($this->prix, 2, ',', ' ') . ' €';
    }

    /**
     * Accesseur pour formater la surface
     */
    public function getFormattedSurfaceAttribute()
    {
        return $this->surface . ' m²';
    }

    /**
     * Accesseur pour formater le type
     */
    public function getFormattedTypeAttribute()
    {
        $types = [
            'studio' => 'Studio',
            'F1' => 'F1 (1 pièce)',
            'F2' => 'F2 (2 pièces)',
            'F3' => 'F3 (3 pièces)',
            'F4' => 'F4 (4 pièces)',
            'F5' => 'F5 (5 pièces)',
            'villa' => 'Villa',
        ];

        return $types[$this->type] ?? $this->type;
    }

    /**
     * Accesseur pour obtenir la première photo
     */
    public function getFirstPhotoAttribute()
    {
        return $this->photos && count($this->photos) > 0 ? $this->photos[0] : null;
    }

    /**
     * Accesseur pour obtenir le nombre de photos
     */
    public function getPhotosCountAttribute()
    {
        return $this->photos ? count($this->photos) : 0;
    }

    /**
     * Vérifier si la maison a des photos
     */
    public function hasPhotos()
    {
        return $this->photos && count($this->photos) > 0;
    }
}
