<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function bookings(): HasMany
{
    return $this->hasMany(Booking::class);
}
    protected $fillable = [
    'name',
    'description',
    'price',
    'duration_days',
    'duration_nights',
    'max_capacity',
    'status',
    'created_by',
];
}