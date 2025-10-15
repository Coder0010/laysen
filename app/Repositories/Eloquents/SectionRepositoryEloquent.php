<?php

namespace App\Repositories\Eloquents;

use App\Models\Section;
use App\Repositories\Contracts\SectionRepositoryContract;
use MkamelMasoud\StarterCoreKit\Repositories\BaseEloquentRepository;

class SectionRepositoryEloquent extends BaseEloquentRepository implements SectionRepositoryContract
{
    /**
     * Return the fully qualified model class name.
     */
    public function entity(): string
    {
        return Section::class;
    }
}
