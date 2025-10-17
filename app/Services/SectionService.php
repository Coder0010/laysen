<?php

namespace App\Services;

use App\Http\DataToObjects\SectionDto;
use App\Models\Section;
use App\Repositories\Contracts\SectionRepositoryContract;
use App\Repositories\Eloquents\SectionRepositoryEloquent;
use MkamelMasoud\StarterCoreKit\Core\BaseService;

/**
 * @extends BaseService<
 *      SectionRepositoryContract,
 *      SectionDto,
 *      Section
 *  >
 *
 * @property SectionRepositoryEloquent $repository
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
