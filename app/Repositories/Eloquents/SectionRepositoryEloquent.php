<?php

namespace App\Repositories\Eloquents;

use App\Models\Section;
use App\Repositories\Contracts\SectionRepositoryContract;
use MkamelMasoud\StarterCoreKit\Core\Repositories\BaseEloquentRepository;

/**
 * @extends BaseEloquentRepository<Section>
 */
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
