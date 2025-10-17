<?php

use App\Http\Controllers\Admin\AdminBusinessController;
use App\Http\Controllers\Admin\AdminLeadController;
use App\Http\Controllers\Admin\AdminSectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect(route('sections.index')));

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => redirect()->route('sections.index'))->name('dashboard');
    Route::resource('businesses', AdminBusinessController::class);
    Route::resource('/leads', AdminLeadController::class)->only(['index', 'destroy']);
    Route::resource('/sections', AdminSectionController::class)->only(['index', 'update']);
});

require __DIR__.'/auth.php';
