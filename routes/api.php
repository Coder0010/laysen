<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('list-business-types', [GuestController::class, 'listBusinessTypes']);
Route::get('list-business-by-type', [GuestController::class, 'listBusinessByType']);
Route::get('list-sections', [GuestController::class, 'listSections']);
Route::get('list-settings', [GuestController::class, 'listSettings']);
Route::post('store-lead', [GuestController::class, 'storeLead'])->middleware('throttle:5,1');
