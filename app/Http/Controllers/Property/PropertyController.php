<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyRentalFee;
use App\Models\PropertyRentalFeeType;
use App\Services\PropertyService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PropertyController extends Controller
{

    public function __construct(
        protected PropertyService $propertyService
    )
    {
    }

    public function show(Request $request, Property $property): Response
    {
        if ($request->user()->cannot('view', $property)) {
            abort(403);
        }
        return Inertia::render('property/Show', [
            'property' => $property->load('city'),
            'fees' => $this->getPropertyFees($property),
        ]);
    }

    public function getPropertyFees(Property $property)
    {

        $agreement = $property->agreements()->where('status', 'active')->first();
        return PropertyRentalFee::query()->whereHas('propertyRentalFeeType', function ($query) use ($agreement) {
            $query->where('property_rental_agreement_id', $agreement->id);
        })->with(['propertyRentalFeeType','propertyRentalFeeType.feeType'])->get();
    }

}
