<?php

namespace App\Http\Controllers\ReadingLog\Category;

use App\Http\Controllers\Controller;
use App\Services\ReadingLogService;
use App\Http\Requests\ReadingLog\Book\SearchRequest;

class SearchInCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(SearchRequest $request, ReadingLogService $readingLogServie)
    {
        $categories = $readingLogServie->getAllaCategories();
        $categoryId = (int) $request->route('categoryId');
        $oneCategory = $readingLogServie->getOneCategory($categoryId);

        $search_str = $request->search_str();
        $books = $readingLogServie->getSearchBooksInCategory($search_str, $categoryId);
        return view('readinglog.category.index')
            ->with('books', $books)
            ->with('categories', $categories)
            ->with('oneCategory', $oneCategory);
    }
}
