<?php

namespace App\Http\Requests;

use App\Traits\PaginatableTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ListSectionRequest extends FormRequest
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
            'slug' => [
                'sometimes',
                'array',
            ],
            'slug.*' => [
                'required',
                'exists:sections,slug',
                'distinct',
            ],
        ], $this->paginationRules());
    }
}
