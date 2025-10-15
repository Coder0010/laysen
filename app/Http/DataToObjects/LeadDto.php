<?php

namespace App\Http\DataToObjects;

use MkamelMasoud\StarterCoreKit\BaseDto;

class LeadDto extends BaseDto
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public ?string $message = null;

}
