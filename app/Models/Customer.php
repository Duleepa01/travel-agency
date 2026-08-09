<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    public function nationality(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'nationality_country_id');
    }

    public function residence(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'residence_country_id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'phone',
    'address',
    'nationality_country_id',
    'residence_country_id',
    'created_by',
];
}