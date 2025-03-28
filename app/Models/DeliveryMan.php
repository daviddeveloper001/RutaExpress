<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DeliveryMan extends Model
{
    use HasFactory;
    protected $fillable = ['company_id', 'vehicle_type', 'trusted_zone'];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function routes(): HasMany
    {
        return $this->hasMany(Route::class);
    }
}
