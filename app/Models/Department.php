<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;
    use SoftDeletes;

    public $incrementing = false; // Necesario para UUIDs
    protected $keyType = 'string'; // Necesario para UUIDs

    protected $fillable = ['name'];
}
