<?php

namespace App\Http\Enums;

enum BusinessTypeEnum: int
{
    case OTHER = 1;
    case COMPANIES = 2;
    case STORE = 3;
    case RESTAURANT = 4;
    public function label(): string
    {
        return match ($this) {
            self::OTHER => 'Other',
            self::COMPANIES => 'Companies',
            self::STORE => 'Store',
            self::RESTAURANT => 'Restaurant',
        };
    }

    public static function options(): array
    {
        return array_map(fn($case) => [
            'value' => $case->value,
            'label' => $case->label(),
        ], self::cases());
    }


}
