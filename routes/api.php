<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GplController;
use App\Http\Controllers\Auth\ApiAuthController;



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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// These routes, are only access via token
Route::group(['prefix' => 'v1', 'middleware' => ['auth:api']], function () {
    // Log out route
    Route::post('user/logout', [ApiAuthController::class, 'logout']);
    Route::get('user/profile', [ApiAuthController::class, 'profile']);


    // Route::middleware('api.admin')

    // Here, we have the gpl routes
    Route::get('gpl', [GplController::class, 'getAllData']);
    Route::get('gpl/{id}', [GplController::class, 'getSingleData']);
    Route::get('gpl_Filter_dates', [GplController::class, 'getDataBtwDates']);
    Route::get('gpl_Filter_year', [GplController::class, 'getDataByYear']);
    Route::post('gpl', [GplController::class, 'createNewData']);
    Route::put('gpl/{id}', [GplController::class, 'updateData']);
    Route::delete('gpl/{id}', [GplController::class, 'deleteData'])->middleware('api.admin');
});

// These routes, can be accessed without token
Route::group(['middleware' => ['cors', 'json.response']], function () {

    Route::prefix('v1')->group(function () {

        // public routes
        Route::post('user/login', [ApiAuthController::class, 'login']);
        Route::post('user/register', [ApiAuthController::class, 'register']);
    });
});
