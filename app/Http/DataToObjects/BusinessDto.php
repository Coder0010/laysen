<?php

namespace App\Http\DataToObjects;

use App\Http\Enums\BusinessTypeEnum;
use Illuminate\Http\UploadedFile;
use MkamelMasoud\StarterCoreKit\BaseDto;

class BusinessDto extends BaseDto
{
    public BusinessTypeEnum $type = BusinessTypeEnum::OTHER;
    public string $name_en = '';
    public string $name_ar = '';
    public ?string $address_en = null;
    public ?string $address_ar = null;
    public string $phone = '';
    public ?string $description_en = null;
    public ?string $description_ar = null;
    public UploadedFile|string|null $file = null;
    public ?string $location = null;
}
