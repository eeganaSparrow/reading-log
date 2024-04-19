<?php

namespace App\Http\Controllers\ReadingLog\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $categoryId = (int) $request->route('categoryId');
        $displayCategoryId = (int) $request->input('displayCategoryId');
        $category = Category::where('id', $categoryId)->firstOrFail();
        $nonCategory = Category::where('category_name', '未カテゴリー')->firstOrFail();
        $nonCategoryId = $nonCategory->id;

        $books = Book::where('category_id', $categoryId)->get();
        foreach ($books as $book){
            $book->category_id = $nonCategoryId;
            $book->save();
        }
        $category->delete();

        if ($categoryId !== $displayCategoryId){
            return redirect()->back();
        } else {
            return redirect()->route('readinglog.category.index', ['categoryId' => $nonCategoryId]);
        }

    }
}
