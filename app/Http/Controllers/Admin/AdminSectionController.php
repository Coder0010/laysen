<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\DataToObjects\SectionDto;
use App\Http\Requests\Admin\AdminSectionRequest;
use App\Services\SectionService;
use Illuminate\Database\RecordNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminSectionController extends Controller
{

    public function __construct(public SectionService $service)
    {
    }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', $this->service->getPerPage());
        $data = $this->service->getFromCache()->paginateOnCollection($perPage);
        return view('admin.sections.index', compact('data'));
    }

    public function update(AdminSectionRequest $request, int $id): RedirectResponse
    {
        $dto = SectionDto::fromRequest($request);

        try {
            $model = $this->service->update($id, $dto);
            return redirect()->back()->with('success', "Record {$model->slug} updated successfully.");
        } catch (RecordNotFoundException $e) {
            return redirect()->back()->with("error", $e->getMessage());
        } catch (\Exception $e) {
            report($e);
            return redirect()->back()->with("error", "Failed To Update Record.");
        }
    }

}
