<?php

namespace App\Models;

use MkamelMasoud\StarterCoreKit\Entity;

class Lead extends Entity
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
    ];

}
