<?php
use Illuminate\Support\Facades\Route;

Route::get('/index', FileUserIndexController::class);
Route::get('/', FileUserShowUserIdController::class);
Route::get('/{fileUserId}',FileUserShowController::class);
Route::post('/', FileUserStoreController::class);
Route::delete('/{fileUserId}',FileUserDestroyController::class);
