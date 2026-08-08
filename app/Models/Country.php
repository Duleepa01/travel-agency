<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    public function destinations(): HasMany
    {
        return $this->hasMany(Destination::class);
    }

    public function nationals(): HasMany
    {
        return $this->hasMany(Customer::class, 'nationality_country_id');
    }

    public function residents(): HasMany
    {
        return $this->hasMany(Customer::class, 'residence_country_id');
    }
}