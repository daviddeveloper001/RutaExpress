<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    /** @use HasFactory<\Database\Factories\RouteFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['company_id', 'delivery_man_id', 'estimated_cost'];
    public function riskZones(): BelongsToMany
    {
        return $this->belongsToMany(RiskZone::class)->withPivot('avoided');
    }
}
