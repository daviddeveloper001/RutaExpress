<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory;
    use SoftDeletes;

    public $incrementing = false; // Necesario para UUIDs
    protected $keyType = 'string'; // Necesario para UUIDs

    protected $fillable = ['name', 'department_id'];
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
