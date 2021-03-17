<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AlbumsController, PhotosController};

Route::get('/', function () {
    return redirect()->route('albums.index');
});
Route::resource('/albums', AlbumsController::class);
Route::get('/albums/{album}/images', [AlbumsController::class,'getImages'])->name('albums.images');
Route::resource('photos', PhotosController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
