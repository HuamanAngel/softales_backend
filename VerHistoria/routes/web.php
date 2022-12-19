<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\TalesController;

Route::get('/', [TalesController::class,'borrar']);
Auth::routes();
