<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class FeeType extends Model
{


    public function property_rental_fee_types(): hasMany
    {
        return $this->hasMany(City::class);
    }

}
