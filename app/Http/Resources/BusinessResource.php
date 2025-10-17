<?php

namespace App\Http\Resources;

use App\Http\Enums\BusinessTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Business
 */
class BusinessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'   => $this->id,
            'type' => [
                'id'      => $this->type,
                'name_en' => $this->type instanceof BusinessTypeEnum
                    ? __(key: __('general.' . $this->type->label(), locale: 'en'))
                    : null,
                'name_ar' => $this->type instanceof BusinessTypeEnum
                    ? __(key: __('general.' . $this->type->label(), locale: 'ar'))
                    : null,
            ],
            'name_en'        => $this->name_en,
            'name_ar'        => $this->name_ar,
            'address_en'     => $this->address_en,
            'address_ar'     => $this->address_ar,
            'description_en' => $this->description_en,
            'description_ar' => $this->description_ar,
            'phone'          => $this->phone,
            'file'           => $this->file !== null
                ? asset('storage/' . $this->file)
                : null,
            'location'   => $this->location,
        ];
    }
}
