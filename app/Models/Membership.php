<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    /** @use HasFactory<\Database\Factories\MembershipFactory> */
    use HasFactory;

    protected $fillable = [
        'tier',
        'price_monthly',
        'price_yearly',
        'features',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
        ];
    }
}
