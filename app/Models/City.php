<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class City extends Model
{
    protected $fillable = [
        'country_id',
        'name',
        'province',
        'postal_code',
        'latitude',
        'longitude',
        'timezone',
        'is_active'
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'is_active' => 'boolean'
    ];

    // Relacje
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    // Spatie Query Builder
    public static function allowedFilters(): array
    {
        return [
            AllowedFilter::exact('country_id'),
            AllowedFilter::exact('is_active'),
            AllowedFilter::scope('has_properties'),
            AllowedFilter::scope('has_available_properties'),
            AllowedFilter::scope('nearby'),
            'name',
            'province',
            'postal_code'
        ];
    }

    public static function allowedSorts(): array
    {
        return [
            'name',
            'province',
            'country_id',
            'properties_count',
            'created_at'
        ];
    }

    public static function allowedIncludes(): array
    {
        return [
            'country',
            'properties',
            'properties.userAccesses',
            'users'
        ];
    }

    // Scopes dla filtrów
    public function scopeHasProperties($query)
    {
        return $query->has('properties');
    }

    public function scopeHasAvailableProperties($query)
    {
        return $query->whereHas('properties', function($q) {
            $q->where('is_available', true)
                ->where('is_published', true);
        });
    }

    public function scopeNearby($query, $coordinates)
    {
        [$latitude, $longitude, $radius] = explode(',', $coordinates);

        return $query->selectRaw("
            *,
            (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance
        ", [$latitude, $longitude, $latitude])
            ->having('distance', '<', $radius ?? 50)
            ->orderBy('distance');
    }

    public function scopeWithPropertiesCount($query)
    {
        return $query->withCount('properties');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Query Builder method
    public static function query()
    {
        return QueryBuilder::for(static::class)
            ->allowedFilters(static::allowedFilters())
            ->allowedSorts(static::allowedSorts())
            ->allowedIncludes(static::allowedIncludes());
    }
}
