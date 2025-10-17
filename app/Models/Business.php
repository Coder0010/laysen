<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use MkamelMasoud\StarterCoreKit\Core\BaseEntity;

/**
 * @property int $id
 * @property string $slug
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $description_en
 * @property string|null $description_ar
 * @property string|null $file
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
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

    protected $casts = [
        'type' => \App\Http\Enums\BusinessTypeEnum::class,
    ];
}
