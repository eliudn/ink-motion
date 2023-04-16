<?php

use Illuminate\Support\Facades\Route;

    Route::post('/{galleryId}',GalleryFileAddFileController::class);
    Route::get( '/',GalleryFileIndexController::class);
    Route::get('/{galleryId}',GalleryFileShowGalleryIdController::class);
    Route::put('/{galleryId}',GalleryFileMoveFeliController::class);
    Route::delete('/{galleryFileId}',GalleryFileDeleteFileController::class);
