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

Route::get('/book/create', App\Http\Controllers\ReadingLog\Book\Create\IndexController::class)
->name('readinglog.book.create.index');
Route::post('/book/create', App\Http\Controllers\ReadingLog\Book\Create\PostController::class)
->name('readinglog.book.create.post');
Route::get('/book/update/{bookId}', App\Http\Controllers\ReadingLog\Book\Update\IndexController::class)
->name('readinglog.book.update.index')->where('bookId', '[0-9]+');
Route::put('/book/update/{bookId}', App\Http\Controllers\ReadingLog\Book\Update\PutController::class)
->name('readinglog.book.update.put')->where('bookId', '[0-9]+');
Route::get('/book/delete', App\Http\Controllers\ReadingLog\Book\Delete\IndexController::class)
->name('readinglog.book.delete.index');
Route::delete('/book/delete', App\Http\Controllers\ReadingLog\Book\Delete\DeleteSelectController::class)
->name('readinglog.book.delete.deleteselect');
Route::delete('/book/delete/{bookId}', App\Http\Controllers\ReadingLog\Book\Delete\DeleteController::class)
->name('readinglog.book.delete.delete');
Route::get('/search', App\Http\Controllers\ReadingLog\Book\SearchController::class)
->name('readinglog.book.search');
Route::get('/category/{categoryId}/search', App\Http\Controllers\ReadingLog\Category\SearchInCategoryController::class)
->name('readinglog.category.search');

Route::post('/category/create', App\Http\Controllers\ReadingLog\Category\CreateController::class)
->name('readinglog.category.create');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
