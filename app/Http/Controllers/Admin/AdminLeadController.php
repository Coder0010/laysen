<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\LeadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminLeadController extends Controller
{
    public function __construct(public LeadService $service)
    {
    }

    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', $this->service->getPerPage());
        $data = $this->service->getFromCache()->paginateOnCollection($perPage);
        return view('admin.lead.index', compact('data'));
    }

    public function destroy($id): RedirectResponse
    {
        $deleted = $this->service->delete($id);

        return redirect()
            ->back()
            ->with(
                $deleted ? 'success' : 'error',
                $deleted ? 'Record deleted successfully.' : 'Failed to delete record.'
            );
    }
}
