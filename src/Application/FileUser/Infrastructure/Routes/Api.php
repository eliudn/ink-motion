<?php
use Illuminate\Support\Facades\Route;

Route::get('/index', FileUserIndexController::class);
Route::get('/', FileUserShowController::class);
Route::get('/{fileUserId}',FileUserShowController::class);
Route::post('/', FileUserStoreController::class);
Route::delete('/{fileUserId}',FileUserDestroyController::class);
