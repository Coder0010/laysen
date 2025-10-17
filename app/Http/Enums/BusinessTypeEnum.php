<?php

namespace App\Http\Enums;

enum BusinessTypeEnum: int
{
    case OTHER      = 1;
    case COMPANY    = 2;
    case STORE      = 3;
    case RESTAURANT = 4;

    public function label(): string
    {
        return match ($this) {
            self::OTHER      => 'Other',
            self::COMPANY    => 'Company',
            self::STORE      => 'Store',
            self::RESTAURANT => 'Restaurant',
        };
    }

    /**
     * @return array<int, array{value: int, label: string}>
     */
    public static function options(): array
    {
        return collect(self::cases())->map(fn ($case) => [
            'id'      => $case->value,
            'name_en' => __(key: 'general.' . $case->label(), locale: 'en'),
            'name_ar' => __(key: 'general.' . $case->label(), locale: 'ar'),
        ])->toArray();
    }
}
