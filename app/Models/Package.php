<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Package extends Model
{
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function destinations(): BelongsToMany
    {
        return $this->belongsToMany(Destination::class, 'destination_package')
                     ->withPivot('day_number')
                     ->withTimestamps();
    }
}