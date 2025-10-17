<?php

namespace App\Http\Requests;

use App\Http\Enums\BusinessTypeEnum;
use App\Traits\PaginatableTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ListBusinessByTypeRequest extends FormRequest
{
    use PaginatableTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return array_merge([
            'type' => [
                'required',
                new Enum(BusinessTypeEnum::class),
            ],
        ], $this->paginationRules());
    }
}
