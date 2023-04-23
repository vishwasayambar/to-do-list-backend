<?php

use App\Http\Controllers\AuthCntroller;
//use App\Http\Controllers\Tenant\BackupDriveController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\GlobalSearchController;
use App\Http\Controllers\WorkspacesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', [AuthCntroller::class, 'register']);
Route::post('login', [AuthCntroller::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthCntroller::class, 'user']);
    Route::put('updateProfile', [AuthCntroller::class, 'updateProfile']);
    Route::get('workspaces', [WorkspacesController::class, 'showData']);
    Route::post('workspace', [WorkspacesController::class, 'store']);
    Route::delete('workspace/{id}', [WorkspacesController::class, 'destroy']);
    Route::put('workspace/{id}', [WorkspacesController::class, 'update']);
    Route::post('cards', [CardController::class, 'store']);
    Route::get('cards/{id}', [CardController::class, 'getWorkspaceCard']);
    Route::put('cards/{id}', [CardController::class, 'update']);
    Route::delete('cards/{id}', [CardController::class, 'destroy']);
    Route::post('searchCards', [CardController::class, 'searchCards']);
    Route::post('globalSearch', GlobalSearchController::class);
//    Route::apiResource('backupDrives', BackupDriveController::class)->only('store', 'index', 'show', 'update');

});
