<?php

namespace App\Http\Controllers\ReadingLog;

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
        $books = $readingLogServie->getAllBooks();
        $categories = $readingLogServie->getAllaCategories();
        return view('readinglog.index')
            ->with('books', $books)
            ->with('categories', $categories);
    }
}
