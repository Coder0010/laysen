<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\DataToObjects\BusinessDto;
use App\Http\Requests\Admin\AdminBusinessRequest;
use App\Services\BusinessService;
use Illuminate\Contracts\View\View;
use Illuminate\Database\RecordNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminBusinessController extends Controller
{
    public function __construct(public BusinessService $service) {}

    public function index(Request $request): View
    {
        $data = $this->service
            ->fetchData(
                cachePrefix: 'admin'
            )
            ->paginateOnCollection(
                perPage: $this->service->getRecordsLimit()
            );

        return view('admin.business.index', compact('data'));
    }

    public function store(AdminBusinessRequest $request): RedirectResponse
    {
        $dto = BusinessDto::fromRequest($request);
        try {
            $this->service->store($dto);

            return redirect()->back()->with('success', 'Record Created successfully.');
        } catch (\Exception $e) {
            report($e);

            return redirect()->back()->with('error', 'Failed To Create Record.');
        }
    }

    public function update(AdminBusinessRequest $request, int $id): RedirectResponse
    {
        $dto = BusinessDto::fromRequest($request);

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
