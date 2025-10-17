<?php

namespace App\Repositories\Eloquents;

use App\Models\Lead;
use App\Repositories\Contracts\LeadRepositoryContract;
use MkamelMasoud\StarterCoreKit\Core\Repositories\BaseEloquentRepository;

/**
 * @extends BaseEloquentRepository<Lead>
 */
class LeadRepositoryEloquent extends BaseEloquentRepository implements LeadRepositoryContract
{
    /**
     * Return the fully qualified model class name.
     */
    public function entity(): string
    {
        return Lead::class;
    }
}
