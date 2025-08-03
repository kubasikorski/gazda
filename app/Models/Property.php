<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Property extends Model
{
    protected $fillable = [
        'uuid',
        'city_id',
        'title',
        'description',
        'address',
        'postal_code',
        'latitude',
        'longitude',
        'property_type',
        'bedrooms',
        'bathrooms',
        'area',
        'area_unit',
        'floor',
        'total_floors',
        'furnishing_status',
        'created_by',
        'is_available',
        'is_published'
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'area' => 'decimal:2',
        'bedrooms' => 'integer',
        'bathrooms' => 'integer',
        'floor' => 'integer',
        'total_floors' => 'integer',
        'is_available' => 'boolean',
        'is_published' => 'boolean'
    ];

    // Relacje
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function agreements(): hasMany
    {
        return $this->hasMany(PropertyRentalAgreement::class);
    }

    public function userAccesses(): HasMany
    {
        return $this->hasMany(UserPropertyAccess::class);
    }

    // Spatie Query Builder
    public static function allowedFilters(): array
    {
        return [
            AllowedFilter::exact('property_type'),
            AllowedFilter::exact('city_id'),
            AllowedFilter::exact('furnishing_status'),
            AllowedFilter::exact('area_unit'),
            AllowedFilter::exact('is_available'),
            AllowedFilter::exact('is_published'),
            AllowedFilter::scope('bedrooms_min'),
            AllowedFilter::scope('bedrooms_max'),
            AllowedFilter::scope('bathrooms_min'),
            AllowedFilter::scope('area_min'),
            AllowedFilter::scope('area_max'),
            AllowedFilter::scope('floor_min'),
            AllowedFilter::scope('floor_max'),
            AllowedFilter::scope('user_access'),
            'title',
            'address',
            'description'
        ];
    }

    public static function allowedSorts(): array
    {
        return [
            'title',
            'area',
            'bedrooms',
            'bathrooms',
            'floor',
            'created_at',
            'updated_at'
        ];
    }

    public static function allowedIncludes(): array
    {
        return [
            'city',
            'city.country',
            'createdBy',
            'userAccesses',
            'userAccesses.user'
        ];
    }

    // Scopes dla filtrów
    public function scopeBedroomsMin($query, $value)
    {
        return $query->where('bedrooms', '>=', $value);
    }

    public function scopeBedroomsMax($query, $value)
    {
        return $query->where('bedrooms', '<=', $value);
    }

    public function scopeBathroomsMin($query, $value)
    {
        return $query->where('bathrooms', '>=', $value);
    }

    public function scopeAreaMin($query, $value)
    {
        return $query->where('area', '>=', $value);
    }

    public function scopeAreaMax($query, $value)
    {
        return $query->where('area', '<=', $value);
    }

    public function scopeFloorMin($query, $value)
    {
        return $query->where('floor', '>=', $value);
    }

    public function scopeFloorMax($query, $value)
    {
        return $query->where('floor', '<=', $value);
    }

    public function scopeUserAccess($query, $userId)
    {
        return $query->whereHas('userAccesses', function($q) use ($userId) {
            $q->where('user_id', $userId)
                ->where('is_active', true)
                ->where('valid_from', '<=', now())
                ->where(function($query) {
                    $query->whereNull('valid_to')
                        ->orWhere('valid_to', '>=', now());
                });
        });
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
