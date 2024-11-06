<?php

use app\Http\Controllers\ImageUploadController;

Route::get('/images', [ImageUploadController::class, 'imageUpload'])->name('images.upload');
Route::post('/images/upload', [ImageUploadController::class, 'imageUploadPost'])->name('images.upload.post');
});
