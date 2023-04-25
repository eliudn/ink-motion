<?php
use Illuminate\Support\Facades\Route;

Route::get('/',                     RepositoryIndexUserIdController::class);
Route::get('/{repositoryId}',       RepositoryShowController::class);
Route::get('/type/index',           RepositoryIndexTypeController::class);
Route::get('/status/index',         RepositoryIndexStatusController::class);

Route::put('/{repositoryId}',       RepositoryUpdateController::class);
Route::put('/{repositoryId}/status',       RepositoryUpdateStatusController::class);

Route::post('/',                    RepositoryStoreController::class);
Route::post('/{repositoryId}/image',RepositoryUpdateImageController::class);

Route::Delete('/{repositoryId}',    RepositoryDeleteController::class);


