<?php

namespace App\Http\DataToObjects;

use MkamelMasoud\StarterCoreKit\Core\BaseDto;

class LeadDto extends BaseDto
{
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public ?string $message = null;
}
