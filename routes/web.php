<?php

use App\Events\NewAlbumCreated;
use App\Mail\TestEmail;
use App\Mail\TestMd;
use App\Models\Album;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AlbumsController, CategoryController, GalleryController, PhotosController};

Route::get('/', function () {
   return View ('welcome');
});

Route::get('/users', function () {
    return View('users');
 });

Route::middleware(['auth'])->prefix('dashboard')->group(function () {

    Route::resource('/albums', AlbumsController::class)->middleware('auth');
    Route::get('/albums/{album}/images', [AlbumsController::class,'getImages'])->name('albums.images')
        ->middleware('can:view,album');
    Route::resource('photos', PhotosController::class);
    Route::resource('categories', CategoryController::class);
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// gallery
Route::group(['prefix' => 'gallery'], function (){
    Route::get('/',  [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('albums', [GalleryController::class, 'index']);
    Route::get('album/{album}/images',  [GalleryController::class, 'showAlbumImages'])->name('gallery.album.images');
    Route::get('categories/{category}/albums',  [GalleryController::class, 'showCategoryAlbums'])->name('gallery.categories.albums');
});


require __DIR__.'/auth.php';

// mail
Route::get('testMail',function (){
    $user = User::get()->first();

    Mail::to($user->email)->send(new TestMd($user));
});
//
// event
Route::get('testEvent',function (){
    $album =Album::first();
      event(new NewAlbumCreated($album));
});
