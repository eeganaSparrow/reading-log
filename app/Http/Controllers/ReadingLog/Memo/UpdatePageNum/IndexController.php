<?php

namespace App\Http\Controllers\ReadingLog\Memo\UpdatePageNum;

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
        $bookId = (int) $request->input('bookId');
        $memoId = (int) $request->route('memoId');
        $categories = $readingLogServie->getAllaCategories();

        $book = $readingLogServie->getBookByBookId($bookId);
        
        $memos = $readingLogServie->getMemosByBookId($bookId);

        return view('readinglog.memo.update_page_num')
            ->with('categories', $categories)
            ->with('book', $book)
            ->with('memos', $memos)
            ->with('memoId', $memoId);
    }
}
