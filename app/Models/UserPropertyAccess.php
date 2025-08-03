<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserPropertyAccess extends Model
{
    protected $table = 'user_property_access';

    protected $fillable = [
        'user_id',
        'property_id',
        'access_type',
        'valid_from',
        'valid_to',
        'is_active',
        'notes',
        'granted_by',
        'granted_at'
    ];

    protected $casts = [
        'valid_from' => 'date',
        'valid_to' => 'date',
        'is_active' => 'boolean',
        'granted_at' => 'datetime'
    ];

    // Relacje
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function grantedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'granted_by');
    }

    // Spatie Query Builder
    public static function allowedFilters(): array
    {
        return [
            AllowedFilter::exact('user_id'),
            AllowedFilter::exact('property_id'),
            AllowedFilter::exact('access_type'),
            AllowedFilter::exact('granted_by'),
            AllowedFilter::exact('is_active'),
            AllowedFilter::scope('valid_at'),
            AllowedFilter::scope('active'),
            AllowedFilter::scope('expired'),
            AllowedFilter::scope('owners'),
            AllowedFilter::scope('tenants'),
            AllowedFilter::scope('managers'),
            AllowedFilter::scope('by_property_type'),
            AllowedFilter::scope('by_city'),
            AllowedFilter::scope('granted_recently'),
            'notes'
        ];
    }

    public static function allowedSorts(): array
    {
        return [
            'valid_from',
            'valid_to',
            'granted_at',
            'access_type',
            'created_at'
        ];
    }

    public static function allowedIncludes(): array
    {
        return [
            'user',
            'property',
            'property.city',
            'property.city.country',
            'grantedBy'
        ];
    }

    // Scopes dla filtrów
    public function scopeValidAt($query, $date)
    {
        return $query->where('valid_from', '<=', $date)
            ->where(function($q) use ($date) {
                $q->whereNull('valid_to')
                    ->orWhere('valid_to', '>=', $date);
            });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where('valid_from', '<=', now())
            ->where(function($q) {
                $q->whereNull('valid_to')
                    ->orWhere('valid_to', '>=', now());
            });
    }

    public function scopeExpired($query)
    {
        return $query->whereNotNull('valid_to')
            ->where('valid_to', '<', now());
    }

    public function scopeOwners($query)
    {
        return $query->whereIn('access_type', ['owner', 'co_owner']);
    }

    public function scopeTenants($query)
    {
        return $query->where('access_type', 'tenant');
    }

    public function scopeManagers($query)
    {
        return $query->whereIn('access_type', [
            'property_manager', 'rental_agent', 'financial_manager', 'maintenance_manager'
        ]);
    }

    public function scopeByPropertyType($query, $propertyType)
    {
        return $query->whereHas('property', function($q) use ($propertyType) {
            $q->where('property_type', $propertyType);
        });
    }

    public function scopeByCity($query, $cityId)
    {
        return $query->whereHas('property', function($q) use ($cityId) {
            $q->where('city_id', $cityId);
        });
    }

    public function scopeGrantedRecently($query, $days = 30)
    {
        return $query->where('granted_at', '>=', now()->subDays($days));
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeForProperty($query, $propertyId)
    {
        return $query->where('property_id', $propertyId);
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
