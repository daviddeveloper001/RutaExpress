<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partnership extends Model
{
    /** @use HasFactory<\Database\Factories\PartnershipFactory> */
    use HasFactory;  
    use SoftDeletes;
    
    protected $fillable = ['company_id', 'partner_name', 'discount'];  
}
