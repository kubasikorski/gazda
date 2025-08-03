<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyRentalFee extends Model
{
    public function propertyRentalFeeType(): BelongsTo
    {
        return $this->belongsTo(PropertyRentalFeeType::class);
    }

}
