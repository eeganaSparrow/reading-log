<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', App\Http\Controllers\ReadingLog\IndexController::class)
->name('readinglog.index');
Route::get('/category/{categoryId}', App\Http\Controllers\ReadingLog\Category\IndexController::class)
->name('readinglog.category.index')->where('categoryId', '[0-9]+');
Route::get('/book/{bookId}', App\Http\Controllers\ReadingLog\Book\IndexController::class)
->name('readinglog.book.index')->where('bookId', '[0-9]+');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
