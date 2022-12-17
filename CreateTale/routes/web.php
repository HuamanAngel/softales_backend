<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;

Route::get('/', [TalesController::class,'borrar']);
Auth::routes();
