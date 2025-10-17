<?php

namespace App\Repositories\Eloquents;

use App\Models\Setting;
use App\Repositories\Contracts\SettingRepositoryContract;
use MkamelMasoud\StarterCoreKit\Core\Repositories\BaseEloquentRepository;

/**
 * @extends BaseEloquentRepository<Setting>
 */
class SettingRepositoryEloquent extends BaseEloquentRepository implements SettingRepositoryContract
{
    /**
     * Return the fully qualified model class name.
     */
    public function entity(): string
    {
        return Setting::class;
    }
}
