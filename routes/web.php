<?php

use Illuminate\Support\Facades\Route;

Route::prefix('painel')->group(function () {
    Route::get('/', [App\Http\Controllers\Painel\HomeController::class, 'index'])->name('painel.home');
});

//Document routes
Route::prefix('/')->group(function () {
    Route::get('/documentacao-api', [App\Http\Controllers\Web\DocumentController::class, 'index'])->name('painel.documents');
});