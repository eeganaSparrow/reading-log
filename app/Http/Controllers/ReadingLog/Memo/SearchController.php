<?php

namespace App\Http\Controllers\ReadingLog\Memo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ReadingLogService;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ReadingLogService $readingLogServie)
    {
        $search_str = $request->input('search_str');
        $categories = $readingLogServie->getAllaCategories();

        $bookId = (int) $request->route('bookId');
        $book = $readingLogServie->getBookByBookId($bookId);

        $memos = $readingLogServie->getSearchMemos($search_str, $bookId);
        foreach($memos as $memo){
            $memo->content = str_replace($search_str, "<span style='background-color: yellow'>{$search_str}</span>", $memo->content);
        }

        return view('readinglog.book.index')
            ->with('categories', $categories)
            ->with('book', $book)
            ->with('memos', $memos);
    }
}
