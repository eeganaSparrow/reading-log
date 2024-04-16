<?php

namespace App\Http\Controllers\ReadingLog\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ReadingLogService;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ReadingLogService $readingLogServie)
    {
        $categories = $readingLogServie->getAllaCategories();

        $bookId = (int) $request->route('bookId');
        $book = $readingLogServie->getBookByBookId($bookId);
        
        $memos = $readingLogServie->getMemosByBookId($bookId);

        return view('readinglog.book.index')
            ->with('categories', $categories)
            ->with('book', $book)
            ->with('memos', $memos);
    }
}
