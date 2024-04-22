<?php

namespace App\Http\Controllers\ReadingLog\Book\Delete;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ReadingLogService;

class DeleteSelectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ReadingLogService $readingLogServie)
    {
        $display = $request->input('display');
        $booksId = $request->input('booksId');
        $categoryId = (int) $request->input('categoryId');

        foreach($booksId as $bookId){
            $readingLogServie->deleteBookAndMemos($bookId);
        }

        if ($display === 'home'){
            return redirect()->route('readinglog.index');
        } elseif ($display === 'category'){
            $categories = $readingLogServie->getAllaCategories();
            $books = $readingLogServie->getBooksByCategoryId($categoryId);
            $oneCategory = $readingLogServie->getOneCategory($categoryId);
            
            return view('readinglog.category.index')
                ->with('books', $books)
                ->with('categories', $categories)
                ->with('categoryId', $categoryId)
                ->with('oneCategory', $oneCategory);
        }
        
    }
}
