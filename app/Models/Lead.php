<?php

namespace App\Models;

use MkamelMasoud\StarterCoreKit\Core\BaseEntity;

class Lead extends BaseEntity
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
    ];
}
