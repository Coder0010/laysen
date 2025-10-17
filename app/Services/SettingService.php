<?php

namespace App\Services;

use App\Http\DataToObjects\SettingDto;
use App\Models\Setting;
use App\Repositories\Contracts\SettingRepositoryContract;
use App\Repositories\Eloquents\SettingRepositoryEloquent;
use MkamelMasoud\StarterCoreKit\Core\BaseService;

/**
 * @extends BaseService<
 *      SettingRepositoryContract,
 *      SettingDto,
 *      Setting
 *  >
 *
 * @property SettingRepositoryEloquent $repository
 */
class SettingService extends BaseService
{
    public function __construct(SettingRepositoryContract $repository)
    {
        $this->validateRepo($repository);
        parent::__construct($repository);
    }

    protected function getRepoClass(): string
    {
        return SettingRepositoryContract::class;
    }

    protected function getDtoClass(): string
    {
        return SettingDto::class;
    }
}
