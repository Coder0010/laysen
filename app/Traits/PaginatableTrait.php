<?php

namespace App\Traits;

trait PaginatableTrait
{
    protected function paginationRules(): array
    {
        return [
            'is_paginated' => 'sometimes|boolean',
            'per_page'     => 'integer|min:1|max:100|required_with:is_paginated',
        ];
    }
}
