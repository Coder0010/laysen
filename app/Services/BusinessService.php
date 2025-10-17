<?php

namespace App\Services;

use App\Http\DataToObjects\BusinessDto;
use App\Models\Business;
use App\Repositories\Contracts\BusinessRepositoryContract;
use App\Repositories\Eloquents\BusinessRepositoryEloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use MkamelMasoud\StarterCoreKit\Core\BaseDto;
use MkamelMasoud\StarterCoreKit\Core\BaseService;

/**
 * @extends BaseService<
 *        BusinessRepositoryContract,
 *        BusinessDto,
 *        Business
 *   >
 *
 * @property BusinessRepositoryEloquent $repository
 */
class BusinessService extends BaseService
{
    public function __construct(BusinessRepositoryContract $repository)
    {
        $this->validateRepo($repository);
        parent::__construct($repository);
    }

    protected function getRepoClass(): string
    {
        return BusinessRepositoryContract::class;
    }

    protected function getDtoClass(): string
    {
        return BusinessDto::class;
    }

    protected function beforeSaveAction(BaseDto $dto, ?string $existingFile = null): BaseDto
    {
        /** @var BusinessDto $dto */
        $dto->file = $this->handleFileUpload($dto->file, $existingFile);

        return $dto;
    }

    protected function beforeDeleteAction(Model $model): void
    {
        /** @var Business $model */
        if ($model->file !== null && Storage::disk('public')->exists($model->file)) {
            Storage::disk('public')->delete($model->file);
        }
    }
}
