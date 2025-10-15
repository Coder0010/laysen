<?php

Route::post('store-lead', [\App\Http\Controllers\GuestController::class, 'storeLead'])
//    ->middleware('throttle:3,1')
;
Route::get('businesses', [\App\Http\Controllers\GuestController::class, 'listBusiness']);
Route::get('list-business-types', [\App\Http\Controllers\GuestController::class, 'listBusinessTypes']);
Route::get('business-by-type', [\App\Http\Controllers\GuestController::class, 'showBusinessByType']);
