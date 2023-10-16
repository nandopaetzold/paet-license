<?php

use Illuminate\Support\Facades\Route;

Route::prefix('painel')->group(function () {
    Route::get('/', [App\Http\Controllers\Painel\HomeController::class, 'index'])->name('painel.home');
});