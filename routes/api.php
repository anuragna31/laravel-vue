<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\V1\Backend\User\AuthenticateController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'api', 'prefix' => 'auth'],function($router) {
    Route::post('/login', [AuthenticateController::class, 'login'])->name('login.admin');
    Route::post('/profile', [AuthenticateController::class, 'profile']);
    Route::post('/logout', [AuthenticateController::class, 'logout']);
    Route::post('/refresh', [AuthenticateController::class, 'refresh']);
});