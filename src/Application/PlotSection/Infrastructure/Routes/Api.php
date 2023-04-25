<?php
use Illuminate\Support\Facades\Route;

Route::get('/',RepositoryIndexUserIdController::class);
Route::post('/',RepositoryStoreController::class);
Route::get('/{repositoryId}',RepositoryShowController::class);
Route::put('/{repositoryId}',RepositoryUpdateController::class);
Route::Delete('/{repositoryId}',RepositoryDeleteController::class);
