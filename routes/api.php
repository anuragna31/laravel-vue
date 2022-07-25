<?php

use App\Http\Controllers\V1\Backend\Data\StoreDataController;
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

Route::prefix('storedata')->group(function() {
    Route::get('/', [StoreDataController::class, 'index']);
    Route::post('/store', [StoreDataController::class, 'store']);
    Route::get('/delete/{id?}', [StoreDataController::class, 'delete']);
    Route::get('/edit/{id?}', [StoreDataController::class, 'edit']);
    Route::post('/update/{id?}', [StoreDataController::class, 'update']);
});