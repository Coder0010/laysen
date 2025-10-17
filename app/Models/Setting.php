<?php

namespace App\Models;

use MkamelMasoud\StarterCoreKit\Core\BaseEntity;

/**
 * @property int $id
 * @property string $key
 * @property string|boolean|object|array $value
 *
 * @mixin \Eloquent
 */
class Setting extends BaseEntity
{
    protected $fillable = [
        'key',
        'value',
    ];

}
