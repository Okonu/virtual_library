<?php

use App\Http\Controllers\API\AuthorsAPIController;
use App\Http\Controllers\API\BooksAPIController;
use App\Http\Controllers\API\GenreAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/authors', [AuthorsAPIController::class, 'index']);
Route::get('/authors/{id}', [AuthorsAPIController::class, 'show']);
Route::post('/authors', [AuthorsAPIController::class, 'store']);
Route::put('/authors/{id}', [AuthorsAPIController::class, 'update']);
Route::delete('/authors/{id}', [AuthorsAPIController::class, 'delete']);

Route::get('/books', [BooksAPIController::class, 'index']);
Route::get('/books/{id}', [BooksAPIController::class, 'show']);
Route::post('/books', [BooksAPIController::class, 'store']);
Route::put('/books/{id}', [BooksAPIController::class, 'update']);
Route::delete('/books/{id}', [BooksAPIController::class, 'delete']);

Route::get('/genres', [GenreAPIController::class, 'index']);
Route::get('/genres/{id}', [GenreAPIController::class, 'show']);
Route::post('/genres', [GenreAPIController::class, 'store']);
Route::put('/genres/{id}', [GenreAPIController::class, 'update']);
Route::delete('/genres/{id}', [GenreAPIController::class, 'delete']);

//get all books in a given genre
Route::get('/genres/{genreId}/books', [GenreAPIController::class, 'getBooksByGenre']);


