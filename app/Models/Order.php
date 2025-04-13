<?php

namespace App\Models;

use App\Enum\OrderStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    use SoftDeletes;

    public $incrementing = false; // Necesario para UUIDs
    protected $keyType = 'string'; // Necesario para UUIDs

    protected $fillable = ['company_id', 'customer_id', 'products', 'status'];
    protected $casts = [
        'status' => OrderStatusEnum::class,
        'products' => 'array',
    ];
    public function routes(): BelongsToMany
    {
        return $this->belongsToMany(Route::class)->withPivot('delivery_order');
    }

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    
}
