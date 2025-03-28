<?php

namespace App\Models;

use App\Enum\RiskTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiskZone extends Model
{
    /** @use HasFactory<\Database\Factories\RiskZoneFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'coordinates',
        'risk_type',
    ];

    protected $casts = [
        'risk_type' => RiskTypeEnum::class,
    ];
}
