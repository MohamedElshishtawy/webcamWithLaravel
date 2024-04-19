<?php

use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('webcamp');
});


Route::post('/upload', [PhotoController::class, 'upload'])->name('upload');
