<?php

use App\Http\Controllers\AuthCntroller;
//use App\Http\Controllers\Tenant\BackupDriveController;
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
//    Route::apiResource('backupDrives', BackupDriveController::class)->only('store', 'index', 'show', 'update');

});
