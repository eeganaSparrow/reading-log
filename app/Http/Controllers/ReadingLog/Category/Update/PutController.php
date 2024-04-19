<?php

namespace App\Http\Controllers\ReadingLog\Category\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReadingLog\Category\UpdateRequest;
use App\Models\Category;
use App\Services\ReadingLogService;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, ReadingLogService $readingLogServie)
    {
        $display = $request->input('display');
        $categoryId = (int) $request->route('categoryId');
        $category = Category::where('id', $categoryId)->firstOrFail();
        $category->category_name = $request->category_name();
        $category->save();

        if ($display === 'home'){    
            return redirect()->route('readinglog.index');
        } elseif ($display === 'category'){
            $displayCategoryId = (int) $request->input('displayCategoryId');
            return redirect()
                ->route('readinglog.category.index', ['categoryId' => $displayCategoryId]);
        } elseif ($display === 'memo'){
            $bookId = (int) $request->input('bookId');
            return redirect()
                ->route('readinglog.book.index', ['bookId' => $bookId]);
        }
        
    }
}
