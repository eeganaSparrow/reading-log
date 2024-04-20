<?php

namespace App\Http\Controllers\ReadingLog\Memo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ReadingLogService;

class SearchAllController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ReadingLogService $readingLogServie)
    {
        $categories = $readingLogServie->getAllaCategories();
        $search_str = $request->input('search_str');
        $memos = $readingLogServie->getSearchAllMemos($search_str);
        foreach($memos as $memo){
            $memo->content = str_replace($search_str, "<span style='background-color: yellow'>{$search_str}</span>", $memo->content);
        }
        $bookIds = $readingLogServie->getSearchBookId($search_str);
        foreach ($bookIds as $bookId){
            $books[] = $readingLogServie->getBookByBookId($bookId);
        }
        return view('readinglog.memo.search_all')
            ->with('books', $books)
            ->with('categories', $categories)
            ->with('memos', $memos);
    }
}
