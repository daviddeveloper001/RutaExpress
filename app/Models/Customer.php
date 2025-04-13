<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    use SoftDeletes;

    public $incrementing = false; // Necesario para UUIDs
    protected $keyType = 'string'; // Necesario para UUIDs

    protected $fillable = ['company_id', 'name', 'frequent_location'];
    public function orders() : HasMany
    {
        return $this->hasMany(Order::class);
    }
}
