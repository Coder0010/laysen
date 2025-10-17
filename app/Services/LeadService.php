<?php

namespace App\Services;

use App\Http\DataToObjects\LeadDto;
use App\Repositories\Contracts\LeadRepositoryContract;
use MkamelMasoud\StarterCoreKit\Core\BaseService;

/**
 * @property \App\Repositories\Eloquents\LeadRepositoryEloquent $repository
 */
class LeadService extends BaseService
{
    public function __construct(LeadRepositoryContract $repository)
    {
        $this->validateRepo($repository);
        parent::__construct($repository);
    }

    protected function getRepoClass(): string
    {
        return LeadRepositoryContract::class;
    }

    protected function getDtoClass(): string
    {
        return LeadDto::class;
    }
}
