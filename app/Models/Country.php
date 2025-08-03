<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Country extends Model
{
    protected $fillable = [
        'name',
        'iso_code',
        'phone_code',
        'currency_code',
        'currency_symbol',
        'timezone_default',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Relacje
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function properties(): HasManyThrough
    {
        return $this->hasManyThrough(Property::class, City::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    // Spatie Query Builder
    public static function allowedFilters(): array
    {
        return [
            AllowedFilter::exact('iso_code'),
            AllowedFilter::exact('currency_code'),
            AllowedFilter::exact('is_active'),
            AllowedFilter::scope('has_cities'),
            AllowedFilter::scope('has_properties'),
            AllowedFilter::scope('has_available_properties'),
            AllowedFilter::scope('in_europe'),
            'name',
            'phone_code',
            'currency_symbol'
        ];
    }

    public static function allowedSorts(): array
    {
        return [
            'name',
            'iso_code',
            'currency_code',
            'cities_count',
            'properties_count',
            'created_at'
        ];
    }

    public static function allowedIncludes(): array
    {
        return [
            'cities',
            'cities.properties',
            'properties',
            'users'
        ];
    }

    // Scopes dla filtrów
    public function scopeHasCities($query)
    {
        return $query->has('cities');
    }

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

    public function scopeWithCitiesCount($query)
    {
        return $query->withCount('cities');
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
