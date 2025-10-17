<?php

use App\Http\Controllers\Admin\AdminBusinessController;
use App\Http\Controllers\Admin\AdminLeadController;
use App\Http\Controllers\Admin\AdminSectionController;
use App\Http\Controllers\Admin\AdminSettingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('dashboard', fn() => redirect()->route('sections.index'))->name('dashboard');
    Route::resource('settings', AdminSettingController::class)->except(['show', 'edit']);
    Route::resource('businesses', AdminBusinessController::class)->except(['show', 'edit']);
    Route::resource('leads', AdminLeadController::class)->only(['index', 'destroy']);
    Route::resource('sections', AdminSectionController::class)->only(['index', 'update']);
});

