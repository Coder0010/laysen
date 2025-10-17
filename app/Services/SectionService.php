<?php

namespace App\Services;

use App\Http\DataToObjects\SectionDto;
use App\Repositories\Contracts\SectionRepositoryContract;
use MkamelMasoud\StarterCoreKit\Core\BaseService;

/**
 * @property \App\Repositories\Eloquents\SectionRepositoryEloquent $repository
 */
class SectionService extends BaseService
{
    public function __construct(SectionRepositoryContract $repository)
    {
        $this->validateRepo($repository);
        parent::__construct($repository);
    }

    protected function getRepoClass(): string
    {
        return SectionRepositoryContract::class;
    }

    protected function getDtoClass(): string
    {
        return SectionDto::class;
    }
}
