<?php

use Illuminate\Support\Facades\Route;

Route::get('/userInformation/index',UserInformationIndexController::class);
Route::get('/{userId}/userInformation',UserInformationShowController::class);
Route::post('/{userId}/userInformation', UserInformationStoreControllers::class);
Route::put('/{userId}/userInformation',UserInformationUpdateController::class);
Route::delete('/{userId}/userInformation',UserInformationDestroyController::class);
