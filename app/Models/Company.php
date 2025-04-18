<?php

namespace App\Models;

use App\Enum\BusinessTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;
    use SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['nit', 'city_id', 'business_type'];
    protected $casts = ['business_type' => BusinessTypeEnum::class];
    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }
    public function deliveryMen() : HasMany
    {
        return $this->hasMany(DeliveryMan::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
