<?php

namespace App\Models;

use App\Enum\OrderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['company_id', 'customer_id', 'products', 'status'];
    protected $casts = [
        'status' => OrderStatusEnum::class,
        'products' => 'array',
    ];
    public function routes(): BelongsToMany
    {
        return $this->belongsToMany(Route::class)->withPivot('delivery_order');
    }
}
