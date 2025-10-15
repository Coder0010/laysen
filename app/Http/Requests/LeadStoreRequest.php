<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use MkamelMasoud\StarterCoreKit\Rules\NoHtmlRule;

class LeadStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                new NoHtmlRule()
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                new NoHtmlRule()
            ],
            'phone' => [
                'required',
                'string',
                'max:20',
                new NoHtmlRule()
            ],
            'message' => [
                'required',
                'string',
                'max:1000',
                new NoHtmlRule()
            ],

        ];
    }
}
