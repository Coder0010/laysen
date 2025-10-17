<?php

namespace App\Models;

use MkamelMasoud\StarterCoreKit\Core\BaseEntity;

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
