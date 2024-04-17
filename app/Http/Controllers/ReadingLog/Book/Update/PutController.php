<?php

namespace App\Http\Controllers\ReadingLog\Book\Update;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReadingLog\Book\UpdateRequest;
use App\Models\Book;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request)
    {
        $bookId = (int) $request->route('bookId');
        $book = Book::where('id', $bookId)->firstOrFail();
        $book->category_id = $request->category_id();
        $book->tytle = $request->tytle();
        $book->author = $request->author();
        $book->publisher = $request->publisher();
        $book->publication_year = $request->publication_year();
        $book->save();

        return redirect()->route('readinglog.book.index', ['bookId' => $book->id]);
    }
}
