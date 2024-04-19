<?php

namespace App\Http\Controllers\ReadingLog\Category\Update;

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
        $display = $request->input('display');
        
        if ($display === 'home'){
            $books = $readingLogServie->getAllBooks();
            $categories = $readingLogServie->getAllaCategories();
            $updateCategoryId = (int) $request->route('categoryId');

            return view('readinglog.category.update')
            ->with('books', $books)
            ->with('categories', $categories)
            ->with('updateCategoryId', $updateCategoryId);

        } elseif ($display === 'category'){
            $categories = $readingLogServie->getAllaCategories();

            $categoryId = (int) $request->route('categoryId');
            $updateCategoryId = (int) $request->input('updateCategoryId');
            $books = $readingLogServie->getBooksByCategoryId($categoryId);
            $oneCategory = $readingLogServie->getOneCategory($categoryId);
            
            return view('readinglog.category.update_in_category')
                ->with('books', $books)
                ->with('categories', $categories)
                ->with('oneCategory', $oneCategory)
                ->with('updateCategoryId', $updateCategoryId);
        } elseif ($display === 'memo'){
            $categories = $readingLogServie->getAllaCategories();

            $bookId = (int) $request->input('bookId');
            $book = $readingLogServie->getBookByBookId($bookId);
            $updateCategoryId = (int) $request->route('categoryId');

            $memos = $readingLogServie->getMemosByBookId($bookId);

            return view('readinglog.category.update_in_memo')
                ->with('categories', $categories)
                ->with('book', $book)
                ->with('memos', $memos)
                ->with('updateCategoryId', $updateCategoryId);
        }
    }
}
