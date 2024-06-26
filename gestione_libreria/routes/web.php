<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
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


 Route::get('/', function () {
    return view('welcome');
}); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
    Route::post('/books/reserve/{bookId}', [ReservationController::class, 'reserve'])->name('book.reserve');
    Route::get('/mybooks', [BookController::class, 'mybooks'])->name('mybooks.index');
    Route::delete('/reservation/{id}/return', [BookController::class, 'return'])->name('reservation.return');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::post('/reservation/store', [BookController::class, 'store'])->name('reservation.store');
    Route::get('/listalibri', [BookController::class, 'index'])->name('listalibri.index');
});
Route::resource('homepage', CategoryController::class);
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::resource('admin', RegisteredUserController::class);
Route::get('/admin/{id}/confirmReservation', [RegisteredUserController::class, 'confirmReservation'])->name('admin.confirmReservation');
Route::delete('/admin/{id}/rejectReservation', [RegisteredUserController::class, 'rejectReservation'])->name('admin.rejectReservation');

require __DIR__.'/auth.php';
