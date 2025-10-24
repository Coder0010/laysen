<?php

namespace App\Traits;

use Illuminate\Validation\Validator;

trait PaginatableTrait
{
    protected function paginationRules(): array
    {
        return [
            'is_paginated' => [
                'sometimes',
                'boolean',
            ],
            'per_page' => [
                'sometimes',
                'integer',
                'min:1',
                'max:100',
                'required_with:is_paginated',
            ],
        ];
    }

    /**
     * Add a post-validation check to ensure per_page isn't allowed without is_paginated
     */
    public function withPaginationValidator(Validator $validator): void
    {
        $validator->after(function ($validator) {
            $data = $this->validationData();

            if (array_key_exists('per_page', $data) && !array_key_exists('is_paginated', $data)) {
                $validator->errors()->add(
                    'per_page',
                    'The per_page field is not allowed without is_paginated.'
                );
            }
        });
    }

    /**
     * Hook into the validator instance
     */
    public function withValidator(Validator $validator): void
    {
        $this->withPaginationValidator($validator);
    }
}
