<?php

namespace App\Services;

use App\Http\DataToObjects\BusinessDto;
use App\Repositories\Contracts\BusinessRepositoryContract;
use Illuminate\Database\RecordNotFoundException;
use Illuminate\Support\Facades\Storage;
use MkamelMasoud\StarterCoreKit\Core\BaseDto;
use MkamelMasoud\StarterCoreKit\Core\BaseService;

/**
 * @property \App\Repositories\Eloquents\BusinessRepositoryEloquent $repository
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
        $dto->file = $this->handleFileUpload($dto->file, $existingFile);

        return $dto;
    }

    protected function beforeDelete($model): void
    {
        if (! empty($model->file) && Storage::disk('public')->exists($model->file)) {
            Storage::disk('public')->delete($model->file);
        }
    }

    public function showByType($type)
    {
        $model = $this->repository->where('type', '=', $type);

        if (! $model) {
            throw new RecordNotFoundException("Record with type {$type} not found");
        }

        return $model->all()->latest()->get();
    }
}
