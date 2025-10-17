<?php

namespace App\Services;

use App\Http\DataToObjects\LeadDto;
use App\Models\Lead;
use App\Repositories\Contracts\LeadRepositoryContract;
use App\Repositories\Eloquents\LeadRepositoryEloquent;
use MkamelMasoud\StarterCoreKit\Core\BaseService;

/**
 * @extends BaseService<
 *       LeadRepositoryContract,
 *       LeadDto,
 *       Lead
 *   >
 *
 * @property LeadRepositoryEloquent $repository
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
