<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\DataToObjects\SettingDto;
use App\Http\Requests\Admin\AdminSettingRequest;
use App\Services\SettingService;
use Illuminate\Contracts\View\View;
use Illuminate\Database\RecordNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function __construct(public SettingService $service) {}

    public function index(Request $request): View
    {
        $data = $this->service
            ->fetchData(
                cachePrefix: 'admin'
            )
            ->paginateOnCollection(
                perPage: $this->service->getRecordsLimit()
            );

        return view('admin.settings.index', compact('data'));
    }

    public function store(AdminSettingRequest $request): RedirectResponse
    {
        $dto = SettingDto::fromRequest($request);
        try {
            $this->service->store($dto);

            return redirect()->back()->with('success', 'Record Created successfully.');
        } catch (\Exception $e) {
            report($e);

            return redirect()->back()->with('error', 'Failed To Create Record.');
        }
    }

    public function update(AdminSettingRequest $request, int $id): RedirectResponse
    {
        $dto = SettingDto::fromRequest($request);

        try {
            $model = $this->service->update($id, $dto);

            return redirect()->back()->with('success', "Record {$model->name_en} Updated Successfully.");
        } catch (RecordNotFoundException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        } catch (\Exception $e) {
            report($e);

            return redirect()->back()->with('error', 'Failed To Update Record.');
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        $deleted = $this->service->delete($id, 'force');

        return redirect()
            ->back()
            ->with(
                $deleted ? 'success' : 'error',
                $deleted ? 'Record Deleted Successfully.' : 'Failed To Delete Record.'
            );
    }
}
