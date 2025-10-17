<?php

namespace App\Models;

use App\Http\Enums\BusinessTypeEnum;
use MkamelMasoud\StarterCoreKit\Core\BaseEntity;

class Business extends BaseEntity
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
