<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('genres')->group(function () {
    Route::get('/', [GenreController::class, 'index'])->name('genres.index');
    Route::get('/create', [GenreController::class, 'create'])->name('genres.create');
    Route::post('/', [GenreController::class, 'store'])->name('genres.store');
    Route::get('/{genre}', [GenreController::class, 'show'])->name('genres.show');
    Route::get('/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');
    Route::put('/{genre}', [GenreController::class, 'update'])->name('genres.update');
    Route::delete('/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy');
});

Route::prefix('authors')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/{author}', [AuthorController::class, 'show'])->name('authors.show');
    Route::get('/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::put('/{author}', [AuthorController::class, 'update'])->name('authors.update');
    Route::delete('/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');
});

Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::get('/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/', [BookController::class, 'store'])->name('books.store');
    Route::get('/{book}', [BookController::class, 'show'])->name('books.show');
    Route::get('/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});
