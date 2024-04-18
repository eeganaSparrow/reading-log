<?php

namespace App\Http\Controllers\ReadingLog\Book\Delete;

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
        $display = $request->input('display');

        if ($display === 'home'){
            $books = $readingLogServie->getAllBooks();
            return view('readinglog.book.delete')
                ->with('books', $books)
                ->with('categories', $categories);
        } elseif ($display === 'category'){
            $categoryId = (int) $request->input('categoryId');
            $books = $readingLogServie->getBooksByCategoryId($categoryId);
            $oneCategory = $readingLogServie->getOneCategory($categoryId);
            
            return view('readinglog.book.delete-in-category-page')
                ->with('books', $books)
                ->with('categories', $categories)
                ->with('oneCategory', $oneCategory);
        }
        
    }
}
