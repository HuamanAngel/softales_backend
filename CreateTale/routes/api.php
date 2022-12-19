<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\TalesController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group([
//     'prefix' => 'auth'
// ], function () {
//     Route::get('user', [AuthController::class,'user']);
//     // Route::group([
//     //   'middleware' => 'auth:api'
//     // ], function() {
//     //     Route::get('logout', [AuthController::class,'logout']);
//     //     Route::get('user', [AuthController::class,'user']);
//     //     Route::get('nivel', [NivelController::class,'index']);
//     //     Route::post('nivel', [NivelController::class,'updateUser']);
//     // });
// });



Route::group([
    'prefix' => 'collection'
], function () {
    Route::get('/', [CollectionController::class,'index']);
    Route::post('/', [CollectionController::class,'store']);
});
Route::group([
    'prefix' => 'tale'
], function () {
    Route::get('/', [TalesController::class,'index']);
    Route::post('/', [TalesController::class,'store']);
});
