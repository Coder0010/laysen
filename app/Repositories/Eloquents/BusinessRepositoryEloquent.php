<?php

namespace App\Repositories\Eloquents;

use App\Models\Business;
use App\Repositories\Contracts\BusinessRepositoryContract;
use MkamelMasoud\StarterCoreKit\Core\Repositories\BaseEloquentRepository;

/**
 * @extends BaseEloquentRepository<Business>
 */
class BusinessRepositoryEloquent extends BaseEloquentRepository implements BusinessRepositoryContract
{
    /**
     * Return the fully qualified model class name.
     */
    public function entity(): string
    {
        return Business::class;
    }
}
