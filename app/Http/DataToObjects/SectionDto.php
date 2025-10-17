<?php

namespace App\Http\DataToObjects;

use MkamelMasoud\StarterCoreKit\Core\BaseDto;

class SectionDto extends BaseDto
{
    public string $name_en = '';

    public string $name_ar = '';

    public ?string $description_en = null;

    public ?string $description_ar = null;
}
