<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    Debugbar::info('in welcome page'); // (message)
    Debugbar::startMeasure('wohoo', 'renderWelcomePage'); // check time to render the welcome page (timeline)
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/post')->group(function () {
    Route::get('/create', [PostController::class, 'create'])->name('post.create');
    Route::get('/', [PostController::class, 'index'])->name('post');
    Route::get('/{id}', [PostController::class, 'show'])->name('post.show');
    Route::post('/', [PostController::class, 'store'])->name('post.store');
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/', [PostController::class, 'update'])->name('post.update');
    Route::delete('/', [PostController::class, 'destroy'])->name('post.destroy');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// fallback routes

Route::fallback(FallbackController::class);
