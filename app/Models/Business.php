<?php

namespace App\Models;

use App\Http\Enums\BusinessTypeEnum;
use MkamelMasoud\StarterCoreKit\Entity;

class Business extends Entity
{
    protected $fillable = [
        'type',
        'name_en',
        'name_ar',
        'address_en',
        'address_ar',
        'phone',
        'description_en',
        'description_ar',
        'file',
        'location',
    ];

    protected function casts(): array
    {
        return [
            'type' => BusinessTypeEnum::class,
        ];
    }
}
