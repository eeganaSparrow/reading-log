<?php

namespace App\Http\Controllers\ReadingLog\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ReadingLogService;
use App\Http\Requests\ReadingLog\Book\SearchRequest;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SearchRequest $request, ReadingLogService $readingLogServie)
    {
        $search_str = $request->search_str();
        $books = $readingLogServie->getSearchBooks($search_str);
        $categories = $readingLogServie->getAllaCategories();
        return view('readinglog.index')
            ->with('books', $books)
            ->with('categories', $categories);
    }
}
