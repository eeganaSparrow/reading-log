<?php

namespace App\Http\Controllers\ReadingLog\Category;

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

        $categoryId = (int) $request->route('categoryId');
        $books = $readingLogServie->getBooksByCategoryId($categoryId);
        $oneCategory = $readingLogServie->getOneCategory($categoryId);
        
        return view('readinglog.category.index')
            ->with('books', $books)
            ->with('categories', $categories)
            ->with('oneCategory', $oneCategory);
    }
}
