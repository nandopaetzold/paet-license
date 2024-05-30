<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\LicenseController;
use App\Http\Controllers\Api\CompanyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::get('/login', [AuthController::class, 'index'])->name('login.index');

//new user
Route::post('/register', [AuthController::class, 'register'])->name('register');


//status token - license
Route::post('/license', [LicenseController::class, 'status'])->name('license.status');
Route::get('/license/{token}', [LicenseController::class, 'status_get'])->name('license.status.get');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/user', [AuthController::class, 'user'])->name('user');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/license/create', [LicenseController::class, 'create'])->name('license.create');
    Route::post('/license/update', [LicenseController::class, 'update'])->name('license.update');
    Route::post('/license/remove', [LicenseController::class, 'delete'])->name('license.delete');

});

//new company
Route::post('/company', [CompanyController::class, 'create'])->name('company.create');

//new auth token
Route::post('/company/auth', [CompanyController::class, 'authenticate'])->name('company.auth');


