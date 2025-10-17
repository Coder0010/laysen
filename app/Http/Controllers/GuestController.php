<?php

namespace App\Http\Controllers;

use App\Http\DataToObjects\LeadDto;
use App\Http\Enums\BusinessTypeEnum;
use App\Http\Requests\LeadStoreRequest;
use App\Http\Resources\BusinessResource;
use App\Services\BusinessService;
use App\Services\LeadService;
use Illuminate\Database\RecordNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use MkamelMasoud\StarterCoreKit\Traits\ApiResponsesTrait;

class GuestController extends Controller
{
    use ApiResponsesTrait;

    public function storeLead(LeadStoreRequest $request)
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

    public function listBusiness(Request $request)
    {
        $service = app(BusinessService::class);
        $perPage = $request->input('per_page', $service->getPerPage());
        $collection = $service->getFromCache()->paginateOnCollection($perPage);

        return BusinessResource::collection($collection);
    }

    public function listBusinessTypes()
    {
        return collect(BusinessTypeEnum::options())->map(function ($option) {
            return [
                'id' => $option['value'],
                'name_en' => $option['label'],
                'name_ar' => $option['label'],
            ];
        })->all();
    }

    public function showBusinessByType(Request $request)
    {
        $request->validate([
            'per_page' => 'nullable|integer|min:1|max:100',
            'type' => [
                'required',
                new Enum(BusinessTypeEnum::class),
            ],
        ]);

        try {
            $service = app(BusinessService::class);
            $perPage = $request->input('per_page', $service->getPerPage());
            $collection = $service->getFromCache('type', '=', $request->type)->paginateOnCollection($perPage);

            return BusinessResource::collection($collection);
        } catch (RecordNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            report($e);

            return redirect()->back()->with('error', 'Failed To Update Record.');
        }

    }
}
