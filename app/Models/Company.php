<?php

namespace App\Models;

use App\Enum\BusinessTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;
    use SoftDeletes;

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
}
