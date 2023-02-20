<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\IndexController;
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

Route::controller(IndexController::class)->group(function () {
   Route::get('/', 'index')->name('home');

   Route::get('/sign_in', 'sign_in')->name('sign_in');
   Route::middleware('auth')->get('/books/create', 'add')->name('create_book');
});

Route::post('/books/create', [BookController::class, 'store'])->name('book.create');
Route::get('/books/{id}', [BookController::class, 'show'])->name('book');

Route::controller(AuthController::class)->group(function () {
    Route::post('/signin', 'signin')->name('login');
    Route::post('/signup', 'signup')->name('register');
    Route::get('/logout','logout')->name('logout');
});
