<?php

namespace App\Http\Controllers\ReadingLog\Book\Update;

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

        return view('readinglog.book.update')
            ->with('book', $book)
            ->with('categories', $categories);
    }
}
