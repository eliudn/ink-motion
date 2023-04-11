<?php

use Illuminate\Support\Facades\Route;


Route::post('/',UserStoreController::class );
Route::get('/', UserIndexController::class);
Route::get('/{userId}', UserShowController::class);
Route::put('/{userId}',UserUpdateController::class);
Route::delete('/{userId}', UserDestroyController::class);
