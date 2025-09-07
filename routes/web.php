<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Models\Role;
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


Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/allcategory', [BlogController::class, 'allCategory'])->name('allcategory');
Route::get('/category/{slug}', [BlogController::class, 'category'])->name('category.show');
Route::get('/post/{slug}', [BlogController::class, 'show'])->name('post.show');
Route::get('/featured', [BlogController::class, 'featured'])->name('posts.featured');
Route::get('/latest', [BlogController::class, 'latest'])->name('posts.latest');
Route::get('/search', [BlogController::class, 'search'])->name('posts.search');






Route::prefix('admin')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
    });


    Route::middleware(['auth'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('filament.admin.auth.logout');
    });
});






