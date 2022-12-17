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


Route::group([
    'prefix' => 'collection'
], function () {
    Route::get('/', [CollectionController::class,'index']);
});
Route::group([
    'prefix' => 'tale'
], function () {
    Route::get('/', [TalesController::class,'index']);
});
