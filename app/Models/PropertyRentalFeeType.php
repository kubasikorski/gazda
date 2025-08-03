<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyRentalFeeType extends Model
{

    // Relacje
    public function feeType(): BelongsTo
    {
        return $this->belongsTo(FeeType::class);
    }
    public function propertyRentalAgreement(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

}
