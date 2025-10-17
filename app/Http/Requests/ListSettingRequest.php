<?php

namespace App\Http\Requests;

use App\Traits\PaginatableTrait;
use Illuminate\Foundation\Http\FormRequest;

class ListSettingRequest extends FormRequest
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
            'key' => [
                'required',
                'string',
                'exists:settings,key',
                'max:255',
                'regex:/^[a-zA-Z0-9_]+$/'
            ],
        ], $this->paginationRules());
    }
}
