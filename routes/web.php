<?php


use App\Http\Controllers\AlbumController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GalleryController::class, 'index']);

Route::get('gallery', function (){
    return view('gallery.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'index']);
});


Route::get('/dashboard', function () {
    return view('admin\dashboard\index');
})->middleware(['auth' ])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::resource('/admin/album', AlbumController::class)->middleware('auth');
Route::resource('/admin/data-photo', PhotoController::class)->middleware('auth');
Route::get('/detail/{photoId}', [PhotoController::class, 'show']);


Route::get('detail', function(){
    return view('detail.index');
});



require __DIR__.'/auth.php';
