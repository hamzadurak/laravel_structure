<?php

use App\Http\Controllers\Language\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;


Route::resource('/language', LanguageController::class)
    ->except(['index', 'show']);

Route::post('/language/datatables', [LanguageController::class, 'datatables'])
    ->name('language.datatables');
