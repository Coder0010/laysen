<?php

namespace App\Http\Requests\Admin;

use App\Http\Enums\BusinessTypeEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use MkamelMasoud\StarterCoreKit\Rules\Validation\NoHtmlRule;

class AdminBusinessRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => [
                'required',
                new Enum(BusinessTypeEnum::class),
            ],
            'name_en' => [
                'required',
                'string',
                'max:255',
                Rule::unique('businesses')->ignore($this->route('business')),
                new NoHtmlRule,
            ],
            'name_ar' => [
                'required',
                'string',
                'max:255',
                Rule::unique('businesses')->ignore($this->route('business')),
                new NoHtmlRule,
            ],
            'address_en' => [
                'required',
                'string',
                'max:255',
                new NoHtmlRule,
            ],
            'address_ar' => [
                'required',
                'string',
                'max:255',
                new NoHtmlRule,
            ],
            'phone' => [
                'required',
                'string',
                'max:20',
            ],
            'description_en' => [
                'required',
                'string',
                'max:1000',
                new NoHtmlRule,
            ],
            'description_ar' => [
                'required',
                'string',
                'max:1000',
                new NoHtmlRule,
            ],
            'file' => [
                'nullable',
                'image',
            ],
            'location' => [
                'nullable',
                'string',
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
