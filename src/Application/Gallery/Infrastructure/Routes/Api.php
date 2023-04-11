<?php
use Illuminate\Support\Facades\Route;

Route::post('/', GalleryStoreController::class);
Route::get('/index', GalleryIndexController::class);
Route::get('/', GalleryShowController::class);
Route::put('/{galleryId}',GalleryUpdateController::class);
Route::delete('/{galleryId}', GalleryDestroyController::class);
