<?php

use App\Http\Controllers\AuthCntroller;
use Illuminate\Http\Request;
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

Route::post('register', [AuthCntroller::class , 'register']);
Route::post('login', [AuthCntroller::class , 'login']);

Route::middleware('auth:sanctum')->group(function (){
   Route::get('user',[AuthCntroller::class , 'user']);
   Route::put('updateProfile',[AuthCntroller::class , 'updateProfile']);
});
