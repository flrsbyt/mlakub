<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopDestination extends Model
{
    use HasFactory;

    protected $table = 'top_destinations';

    protected $fillable = [
        'name',
        'bookings',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'bookings' => 'integer',
        'sort_order' => 'integer',
    ];
}
