<?php

namespace App\Models;

use MkamelMasoud\StarterCoreKit\Core\BaseEntity;

/**
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $message
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @mixin \Eloquent
 */
class Lead extends BaseEntity
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
    ];
}
