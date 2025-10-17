<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use MkamelMasoud\StarterCoreKit\Rules\Validation\NoHtmlRule;

class AdminSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'key' => [
                'required',
                'string',
                'max:255',
                new NoHtmlRule,
            ],
            'value' => [
                'required',
                'string',
                'max:1000',
            ],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $id = $this->route('id') ?? $this->route('setting');

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
