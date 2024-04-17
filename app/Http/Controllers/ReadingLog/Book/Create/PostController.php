<?php

namespace App\Http\Controllers\ReadingLog\Book\Create;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReadingLog\Book\CreateRequest;
use App\Models\Book;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        $book = new Book;
        $book->category_id = $request->category_id();
        $book->tytle = $request->tytle();
        $book->author = $request->author();
        $book->publisher = $request->publisher();
        $book->publication_year = $request->publication_year();
        $book->save();

        return redirect()->route('readinglog.index');
    }
}