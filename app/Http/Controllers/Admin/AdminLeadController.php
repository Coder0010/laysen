<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\LeadService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminLeadController extends Controller
{
    public function __construct(public LeadService $service) {}

    /**
     * Handle the incoming request.
     */
    public function index(Request $request): View
    {
        $data = $this->service
            ->fetchData(
                cachePrefix: 'admin'
            )
            ->paginateOnCollection(
                perPage: $this->service->getRecordsLimit()
            );

        return view('admin.lead.index', compact('data'));
    }

    public function destroy(int $id): RedirectResponse
    {
        $deleted = $this->service->delete($id, 'force');

        return redirect()
            ->back()
            ->with(
                $deleted ? 'success' : 'error',
                $deleted ? 'Record deleted successfully.' : 'Failed to delete record.'
            );
    }
}
