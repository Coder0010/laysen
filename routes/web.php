<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect(route('sections.index')));

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
