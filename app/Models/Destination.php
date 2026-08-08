<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Destination extends Model
{
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Package::class, 'destination_package')
                     ->withPivot('day_number')
                     ->withTimestamps();
    }
}