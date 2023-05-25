<?php

use Illuminate\Support\Facades\Route;

Route::post('/', SeasonStoreController::class);

Route::put('/{seasonId}/status',SeasonUpdateStatusController::class);


