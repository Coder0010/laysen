<?php

namespace App\Models;

use MkamelMasoud\StarterCoreKit\Core\BaseEntity;

/**
 * @property int $id
 * @property string $slug
 * @property string|null $name_en
 * @property string|null $name_ar
 * @property string|null $description_en
 * @property string|null $description_ar
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @mixin \Eloquent
 */
class Section extends BaseEntity
{
    protected $fillable = [
        'slug',
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
    ];

    protected static function booted()
    {
        parent::booted();
        static::creating(function ($model) {
            $model->slug = str($model->name_en)->slug();
        });
    }
}
