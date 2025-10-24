<?php

namespace App\Http\Controllers;

use App\Http\DataToObjects\LeadDto;
use App\Http\Enums\BusinessTypeEnum;
use App\Http\Requests\LeadStoreRequest;
use App\Http\Requests\ListBusinessByTypeRequest;
use App\Http\Requests\ListSectionRequest;
use App\Http\Requests\ListSettingRequest;
use App\Http\Resources\BusinessResource;
use App\Http\Resources\SectionResource;
use App\Http\Resources\SettingResource;
use App\Services\BusinessService;
use App\Services\LeadService;
use App\Services\SectionService;
use App\Services\SettingService;
use Illuminate\Database\RecordNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use MkamelMasoud\StarterCoreKit\Traits\Api\ApiResponsesTrait;

class GuestController extends Controller
{
    use ApiResponsesTrait;

    /**
     * @return array<int, array{id: int|string, name_en: string, name_ar: string}>
     */
    public function listBusinessTypes(): array
    {
        return BusinessTypeEnum::options();
    }

    public function listBusinessByType(ListBusinessByTypeRequest $request): AnonymousResourceCollection|JsonResponse
    {
        try {
            $service = app(BusinessService::class);
            $perPage = $request->input('per_page', $service->getRecordsLimit());
            $collection = $service
                ->fetchData(
                    filters: [
                        'type' => $request->type,
                    ]
                )
                ->when(
                    $request->boolean('is_paginated'),
                    fn($q) => $q->paginateOnCollection(perPage: $perPage)
                );

            return BusinessResource::collection($collection);
        } catch (RecordNotFoundException $e) {
            return $this->error(message: $e->getMessage(), statusCode: 404);
        } catch (\Exception $e) {
            report($e);

            return $this->error(message: 'Failed To Fetch Records.', statusCode: 500);
        }
    }

    public function listSections(ListSectionRequest $request)
    {
        try {
            $service = app(SectionService::class);
            $perPage = $request->input('per_page', $service->getRecordsLimit());
            $collection = $service->fetchData(
                filters: [
                    'slug' => $request->slug,
                ]
            )
                ->when(
                    $request->boolean('is_paginated'),
                    fn($q) => $q->paginateOnCollection(perPage: $perPage)
                );

            return SectionResource::collection($collection);
        } catch (\Throwable $e) {
            report($e);

            return $this->error(message: 'Failed To Fetch Records.', statusCode: 500);
        }
    }

    public function listSettings(ListSettingRequest $request)
    {
        try {
            $service = app(SettingService::class);
            $perPage = $request->input('per_page', $service->getRecordsLimit());
            $collection = $service
                ->fetchData(
                    filters: [
                        'key' => $request->key,
                    ]
                )
                ->when(
                    $request->boolean('is_paginated'),
                    fn($q) => $q->paginateOnCollection(perPage: $perPage)
                );

            return SettingResource::collection($collection);
        } catch (RecordNotFoundException $e) {
            return $this->error(message: $e->getMessage(), statusCode: 404);
        } catch (\Exception $e) {
            report($e);

            return $this->error(message: 'Failed To Fetch Records.', statusCode: 500);
        }
    }

    public function storeLead(LeadStoreRequest $request): JsonResponse
    {
        $dto = LeadDto::fromRequest($request);
        try {
            app(LeadService::class)->store($dto);

            return $this->success(message: 'Thank you for contacting us!');
        } catch (\Exception $e) {
            report($e);

            return $this->error(message: 'Failed To Create Record.', statusCode: 422);
        }
    }

}
