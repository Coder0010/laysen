<?php

namespace App\Http\DataToObjects;

use MkamelMasoud\StarterCoreKit\Core\BaseDto;

class SettingDto extends BaseDto
{
    public string $key = '';

    public string|bool|array|object $value = '';

}
