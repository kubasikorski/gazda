<?php

namespace App\Services;

use App\Models\User;
use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class UserPropertyService
{
    /**
     * Pobierz wszystkie nieruchomości dla użytkownika
     */
    public function getUserProperties(User $user): Collection
    {
        return Property::whereHas('userAccesses', function ($query) use ($user) {
            $query->where('user_id', $user->id)
                ->where('is_active', true)
                ->where('valid_from', '<=', now())
                ->where(function ($q) {
                    $q->whereNull('valid_to')
                        ->orWhere('valid_to', '>=', now());
                });
        })->with(['city.country', 'userAccesses' => function ($query) use ($user) {
            $query->where('user_id', $user->id)->where('is_active', true);
        }])->get();
    }

    /**
     * Pobierz nieruchomości według typu dostępu
     */
    public function getUserPropertiesByAccessType(User $user, string $accessType): Collection
    {
        return Property::whereHas('userAccesses', function ($query) use ($user, $accessType) {
            $query->where('user_id', $user->id)
                ->where('access_type', $accessType)
                ->where('is_active', true)
                ->where('valid_from', '<=', now())
                ->where(function ($q) {
                    $q->whereNull('valid_to')
                        ->orWhere('valid_to', '>=', now());
                });
        })->with(['city.country'])->get();
    }

    /**
     * Pobierz nieruchomości które użytkownik posiada (owner, co_owner)
     */
    public function getOwnedProperties(User $user): Collection
    {
        return $this->getUserPropertiesByMultipleAccessTypes($user, ['owner', 'co_owner']);
    }

    /**
     * Pobierz nieruchomości które użytkownik zarządza
     */
    public function getManagedProperties(User $user): Collection
    {
        return $this->getUserPropertiesByMultipleAccessTypes($user, [
            'property_manager', 'rental_agent', 'financial_manager'
        ]);
    }

    /**
     * Pobierz nieruchomości które użytkownik wynajmuje
     */
    public function getRentedProperties(User $user): Collection
    {
        return $this->getUserPropertiesByAccessType($user, 'tenant');
    }

    /**
     * Sprawdź czy użytkownik ma dostęp do nieruchomości
     */
    public function hasPropertyAccess(User $user, Property $property, ?string $accessType = null): bool
    {
        $query = $property->userAccesses()
            ->where('user_id', $user->id)
            ->where('is_active', true)
            ->where('valid_from', '<=', now())
            ->where(function ($q) {
                $q->whereNull('valid_to')
                    ->orWhere('valid_to', '>=', now());
            });

        if ($accessType) {
            $query->where('access_type', $accessType);
        }

        return $query->exists();
    }

    /**
     * Pobierz typ dostępu użytkownika do nieruchomości
     */
    public function getPropertyAccessType(User $user, Property $property): ?string
    {
        $access = $property->userAccesses()
            ->where('user_id', $user->id)
            ->where('is_active', true)
            ->where('valid_from', '<=', now())
            ->where(function ($q) {
                $q->whereNull('valid_to')
                    ->orWhere('valid_to', '>=', now());
            })
            ->first();

        return $access?->access_type;
    }

    /**
     * Pobierz statystyki nieruchomości użytkownika
     */
    public function getUserPropertyStats(User $user): array
    {
        $properties = $this->getUserProperties($user);

        return [
            'total' => $properties->count(),
            'owned' => $properties->filter(function ($property) use ($user) {
                return in_array($this->getPropertyAccessType($user, $property), ['owner', 'co_owner']);
            })->count(),
            'managed' => $properties->filter(function ($property) use ($user) {
                return in_array($this->getPropertyAccessType($user, $property), [
                    'property_manager', 'rental_agent', 'financial_manager'
                ]);
            })->count(),
            'rented' => $properties->filter(function ($property) use ($user) {
                return $this->getPropertyAccessType($user, $property) === 'tenant';
            })->count(),
            'available' => $properties->where('is_available', true)->count(),
            'published' => $properties->where('is_published', true)->count(),
        ];
    }


    /**
     * Prywatna metoda dla wielu typów dostępu
     */
    private function getUserPropertiesByMultipleAccessTypes(User $user, array $accessTypes): Collection
    {
        return Property::whereHas('userAccesses', function ($query) use ($user, $accessTypes) {
            $query->where('user_id', $user->id)
                ->whereIn('access_type', $accessTypes)
                ->where('is_active', true)
                ->where('valid_from', '<=', now())
                ->where(function ($q) {
                    $q->whereNull('valid_to')
                        ->orWhere('valid_to', '>=', now());
                });
        })->with(['city.country'])->get();
    }

    /**
     * Wyczyść cache dla użytkownika
     */
    public function clearUserPropertiesCache(User $user): void
    {
        Cache::forget("user_properties_{$user->id}");
    }
}
