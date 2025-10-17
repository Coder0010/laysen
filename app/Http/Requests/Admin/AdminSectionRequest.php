<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use MkamelMasoud\StarterCoreKit\Rules\Validation\NoHtmlRule;

class AdminSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_en' => [
                'required',
                'string',
                'max:255',
                new NoHtmlRule,
            ],
            'name_ar' => [
                'required',
                'string',
                'max:255',
            ],
            'description_en' => [
                'required',
                'string',
                'max:1000',
            ],
            'description_ar' => [
                'required',
                'string',
                'max:1000',
            ],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $id = $this->route('id') ?? $this->route('business');

        $modalName = $id
            ? 'edit-popup-model-' . $id
            : 'create-popup-model';

        throw new HttpResponseException(
            redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('open_popup_modal', $modalName)
        );

    }
}
